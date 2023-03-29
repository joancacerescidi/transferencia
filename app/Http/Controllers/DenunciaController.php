<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Artesaos\SEOTools\Facades\SEOTools;

class DenunciaController extends Controller
{
    //
    public function index()
    {
        $this->seo();
        return view('denuncia.index');
    }
    public function created(Request $request)
    {

        $request->validate([
            'ruc_entidad' => 'required|integer',
            'entidad' => 'required|string',
            'detalle' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|integer',
            'nombres' => 'required|string',
            'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha],
            'files.*' => 'nullable|file|max:10000|mimes:pdf,png,jpeg,jpg',
        ], [
            'ruc_entidad.required' => 'El campo ruc Entidad no puede estar vacío',
            'ruc_entidad.integer' => 'El campo ruc Entidad solo debe contener números, sin caracteres especiales',

            'entidad.required' => 'El campo entidad no puede estar vacío',
            'entidad.string' => 'El campo entidad debe ser una cadena de texto',

            'detalle.required' => 'El campo detalle no puede estar vacío',
            'detalle.string' => 'El campo detalle debe ser una cadena de texto',

            'email.required' => 'El campo email no puedo estar vacío',
            'email.email' => 'El campo email debe tener el formato de un correo',

            'telefono.required' => 'El campo teléfono no puedo estar vacío',
            'telefono.integer' => 'El campo teléfono solo debe contener números, sin caracteres especiales',

            'nombres.required' => 'El campo nombre no puedo estar vacío',
            'nombres.string' => 'El campo nombre debe debe ser una cadena de texto',
        ]);

        DB::beginTransaction();
        try {
            $fechaCreated = date("F j, Y, g:i a");
            $ipUser = $this->getIpUser();
            $resultId = DB::table('denuncia')->insertGetId([
                'fecha' => $fechaCreated,
                'IP' => $ipUser,
                'ruc_entidad' => $request->ruc_entidad,
                'entidad' => $request->entidad,
                'detalle' => $request->detalle,
                'telefono' =>  $request->telefono,
                'nombres' =>  $request->nombres,
            ]);
            $item = 0;
            if ($request->file('files')) {
                foreach ($request->file('files') as $requestFile) {
                    $item++;
                    #Obtenemos el archivo
                    $file = $requestFile;
                    #Obtenemos el verdadero nombre del archivo
                    $fileName = $file->getClientOriginalName();
                    #obtenemos el nombre del archivo sin su extensión
                    $fileName = pathinfo($fileName, PATHINFO_FILENAME);
                    #Reemplazamos los espacios con un '_' ,el nombre del archivo
                    $nameFile = strtolower(str_replace(" ", "_", $fileName));
                    #Obtenemos la extensión del archivo
                    $extension = strtolower($file->getClientOriginalExtension());
                    #Seteamos la zona horaria
                    date_default_timezone_set("America/Lima");
                    #Armamos el nombre final del archivo
                    $nameFinal = date('His') . '-' . $nameFile . '.' . $extension;
                    #movemos el archivo en la carpeta Public/files ,clasificandolo por su extensión
                    $path = 'files/' . $extension;
                    $file->move(public_path($path), $nameFinal);
                    #Armamos la ruta del archivo para guardarlo en la BD
                    $rutaFile =  $path . '/' . $nameFinal;
                    #Guardamos los datos del archivo en la BD
                    DB::table('denuncia_archivo')->insert([
                        'iddenuncia' => $resultId,
                        'item' => $item,
                        'nombrearchivo' =>  $nameFinal,
                        'path' => $rutaFile,
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            throw $ex;
            return back()->with('errorSave', 'error');
        }
        return back()->with('success', 'éxito');
    }
    function getIpUser()
    {

        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
            return $_SERVER["HTTP_X_FORWARDED"];
        } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
            return $_SERVER["HTTP_FORWARDED"];
        } else {
            return $_SERVER["REMOTE_ADDR"];
        }
    }
    public function seo()
    {
        SEOTools::setTitle('Qullqita Qitapay - Comparte información', false);
        SEOTools::setDescription('Comparte información - Si tienes conocimiento de información que podría servir, puedes rellenar el siguiente formulario y ayudar a la justicia.');
        SEOTools::opengraph()->setUrl('https://qqperu.com/');
        SEOTools::setCanonical('https://qqperu.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://qqperu.com/images/iconQuiilquitaQatipay.jpeg');
    }
}
