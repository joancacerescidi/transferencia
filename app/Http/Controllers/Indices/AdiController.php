<?php

namespace App\Http\Controllers\Indices;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\SEOTools;

class AdiController extends Controller
{
    //
    public function first($rucEntidad, $period, $nameEntidad, $ruta, $primaryVariable, $orderTable, $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $orderTables = ['cantidad', 'monto'];
        $validator = Validator::make(['period' => $period, 'rucEntidad' => $rucEntidad, 'orderTable' => $orderTable], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucEntidad' => ['required', 'integer'],
            'orderTable' => ['required', 'string', Rule::in($orderTables)],
        ]);
        if (!$validator->fails()) {
            $result = $this->firstDetail($rucEntidad, $period, $orderTable);
            $this->seo($rucEntidad, $period, 1);
            return view('detail.indices.adi.firstDetail', compact('result', 'rucEntidad', 'period', 'busquedaPalabra', 'nameEntidad', 'ruta', 'primaryVariable', 'orderTable'));
        } else {
            abort(404);
        }
    }
    public function firstDetail($rucEntidad, $period, $orderTable)
    {

        $data = DB::table(DB::raw('osce_ordencompra oo'))
            ->select('oo.ruc_contratista', 'oo.nombre_razon_contratista', DB::raw('count(1) as cantidad'), DB::raw('sum(oo.monto_total_original) as monto'))
            ->where('oo.anno', '=', $period)
            ->where('oo.ruc_entidad', '=', $rucEntidad)
            ->where(function ($query) {
                $query->where('oo.tipocontratacion', '=', 'Otras contrataciones sin proceso de selección previo')
                    ->orWhere('oo.tipocontratacion', '=', 'Deviene de Exoneraciones / Contratación Directa');
            })
            ->where('oo.estadocontratacion', '<>', 'Anulada')
            ->groupBy(['oo.ruc_contratista', 'oo.nombre_razon_contratista'])
            ->orderBy($orderTable, 'DESC')
            ->paginate(10);

        return $data;
    }
    public function second($rucContratista, $rucEntidad, $period, $nameEntidad, $ruc, $nameRuc, $ruta, $primaryVariable, $orderTable, $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $orderTables = ['fecha_emision', 'monto_total_original'];
        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista, 'rucEntidad' => $rucEntidad, 'orderTable' => $orderTable], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer'],
            'rucEntidad' => ['required', 'integer'],
            'orderTable' => ['required', 'string', Rule::in($orderTables)],
        ]);
        if (!$validator->fails()) {
            $result = $this->secondDetail($rucEntidad, $rucContratista, $period, $orderTable);
            $this->seo($rucEntidad, $period, 2, $rucContratista);
            return view('detail.indices.adi.secondDetail', compact('result', 'rucEntidad', 'rucContratista', 'period', 'busquedaPalabra', 'nameEntidad', 'orderTable', 'ruc', 'nameRuc', 'ruta', 'primaryVariable'));
        } else {
            abort(404);
        }
    }
    public function secondDetail($rucEntidad, $rucContratista, $period, $orderTable)
    {

        $data =  DB::table('osce_ordencompra')
            ->select('fecha_emision', 'descripcion_orden', 'orden', 'objetocontractual', 'moneda', 'monto_total_original', 'tipocontratacion')
            ->where('anno', '=', $period)
            ->where('ruc_entidad', '=', $rucEntidad)
            ->where('ruc_contratista', '=', $rucContratista)
            ->orderBy($orderTable, 'DESC')
            ->paginate(10);
        return $data;
    }

    public function seo($rucEntidad, $period, $order, $rucContratista='')
    {
        SEOTools::setTitle('Qullqita Qitapay - Adjudicaciones directas', false);
        if ($order == 1) {
            SEOTools::setDescription('Adjudicaciones directas - ' . 'Ruc Entidad : ' . $rucEntidad . ' - Período: ' . $period);
        }
        if ($order == 2) {
            SEOTools::setDescription('Adjudicaciones directas - ' . 'Ruc Entidad : ' . $rucEntidad .'- Ruc Contratista : '. $rucContratista. ' - Período: ' . $period);
        }

        SEOTools::opengraph()->setUrl('https://qqperu.com/');
        SEOTools::setCanonical('https://qqperu.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://qqperu.com/images/iconQuiilquitaQatipay.jpeg');
    }
}
