<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Http;

class FeedbackController extends Controller
{
    //
    public function index()
    {
        $this->seo();
        return view('feedback.index');
    }
    public function created(Request $request)
    {
        
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
         'secret'=> '6LeDPkElAAAAAC5OGElNY0uXx_v8x70SkY6O4tuw',
         'response'=>$request->iput('g-recaptcha-response')
        ])->object();

        return $response;

        $request->validate([
            'detalle' => 'required|string',
            'telefono' => 'required|integer',
            'email' => 'required|email',
            'nombre' => 'required|string',
        ], [
            'detalle.required' => 'El campo detalle no puede estar vacío',
            'detalle.string' => 'El campo detalle debe ser una cadena de texto',
            'telefono.required' => 'El campo teléfono no puedo estar vacío',
            'telefono.integer' => 'El campo teléfono solo debe contener números, sin caracteres especiales',
            'email.required' => 'El campo email no puedo estar vacío',
            'email.email' => 'El campo email debe tener el formato de un correo',
            'nombre.required' => 'El campo nombre no puedo estar vacío',
            'nombre.string' => 'El campo nombre debe debe ser una cadena de texto',
        ]);
        DB::beginTransaction();
        try {

            DB::table('feedback')->insert([
                'detalle' => $request->detalle,
                'telefono' => $request->telefono,
                'email' => $request->email,
                'nombre' =>  $request->nombre,
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            // throw $ex;
            return back()->with('errorSave', 'error');
        }
        return back()->with('success', 'éxito');
    }
    public function seo()
    {
        SEOTools::setTitle('Qullqita Qitapay - ¿Cómo podemos mejorar?', false);
        SEOTools::setDescription('Danos tu opinión : Tu opinión es muy importante por eso nos gustaría que rellenaras el siguiente formulario.');
        SEOTools::opengraph()->setUrl('https://qqperu.com/');
        SEOTools::setCanonical('https://qqperu.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://qqperu.com/images/iconQuiilquitaQatipay.jpeg');
    }
}
