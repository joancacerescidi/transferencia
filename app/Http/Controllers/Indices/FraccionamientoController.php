<?php

namespace App\Http\Controllers\Indices;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Artesaos\SEOTools\Facades\SEOTools;
class FraccionamientoController extends Controller
{
    //
    public function first($rucEntidad, $period, $nameEntidad, $ruta, $primaryVariable, $orderTable, $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $orderTables = ['cantidad', 'monto'];
        $validator = Validator::make(['period' => $period, 'rucEntidad' => $rucEntidad, 'orderTable' => $orderTable], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'orderTable' => ['required', 'string', Rule::in($orderTables)],
            'rucEntidad' => ['required', 'integer'],
        ]);
        if (!$validator->fails()) {
            $result = $this->firstDetail($rucEntidad, $period, $orderTable);
            $nombreRuta = Route::currentRouteName();
            $this->seo($rucEntidad, $period, 1);
            return view('detail.indices.fraccionamiento.firstDetail', compact('result', 'rucEntidad', 'period', 'busquedaPalabra', 'nameEntidad', 'nombreRuta', 'ruta', 'primaryVariable', 'orderTable'));
        } else {
            abort(404);
        }
    }
    public function firstDetail($rucEntidad, $period, $orderTable)
    {
        $data = DB::table(DB::raw("(select ruc_contratista as ruc , nombre_razon_contratista as nombre, count(1) as cantidad, sum(monto_total_original) as monto
                    from osce_ordencompra oo
                    where anno='$period' 
                    and ruc_entidad='$rucEntidad' 
                    and oo.estadocontratacion<>'Anulada'
                    group by ruc_contratista, nombre_razon_contratista
                    having count(1)>3 	
                union
                select ruc_contratista, nombre_contratista, count(1), sum(monto_contratado_item)
                    from osce_contrato oo
                    where anno='$period' 
                    and ruc_entidad='$rucEntidad' 
                    group by ruc_contratista, nombre_contratista
                    having count(1)>3) a"))
            ->select('ruc', 'nombre', DB::raw('sum(cantidad) as cantidad'), DB::raw('sum(monto) as monto'))
            ->groupBy(['ruc', 'nombre'])
            ->orderBy($orderTable, 'DESC')
            ->paginate(10);

        return $data;
    }
    public function second($rucContratista, $rucEntidad, $period, $filter, $nameEntidad, $ruc, $nameRuc, $ruta,  $primaryVariable, $orderTable, $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $filters = ['orden-compra', 'contrato'];
        $orderTables = ['fecha_emision', 'monto_total_original', 'fecha_suscripcion_contrato', 'monto_contratado_item'];
        $validator = Validator::make(['period' => $period, 'rucEntidad' => $rucEntidad, 'rucContratista' => $rucContratista, 'filter' => $filter, 'orderTable' => $orderTable], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucEntidad' => ['required', 'integer'],
            'rucContratista' => ['required', 'integer'],
            'filter' => ['required', 'string', Rule::in($filters)],
            'orderTable' => ['required', 'string', Rule::in($orderTables)],
        ]);
        if (!$validator->fails()) {
            $result = $this->secondDetail($rucContratista, $rucEntidad, $period, $filter, $orderTable);
            $this->seo($rucEntidad, $period, 2, $rucContratista);
            return view('detail.indices.fraccionamiento.secondDetail', compact('result', 'filter', 'period', 'rucContratista', 'rucEntidad', 'busquedaPalabra', 'nameEntidad', 'ruc', 'nameRuc', 'ruta', 'primaryVariable', 'orderTable'));
        } else {
            abort(404);
        }
    }
    public function secondDetail($rucContratista, $rucEntidad, $period, $filter, $orderTable)
    {
        if ($filter == 'orden-compra') {
            $data = DB::table('osce_ordencompra')
                ->select('fecha_emision', 'descripcion_orden', 'orden', 'objetocontractual', 'moneda', 'monto_total_original')
                ->where('anno', '=', $period)
                ->where('ruc_entidad', '=', $rucEntidad)
                ->where('ruc_contratista', '=', $rucContratista)
                ->orderBy($orderTable, 'DESC')
                ->paginate(10);
        } else if ($filter == 'contrato') {
            $data = DB::table('osce_contrato')
                ->select('fecha_suscripcion_contrato', 'descripcion_proceso', 'num_contrato', 'urlcontrato', 'moneda', 'monto_contratado_item')
                ->where('anno', '=', $period)
                ->where('ruc_entidad', '=', $rucEntidad)
                ->where('ruc_contratista', '=', $rucContratista)
                ->orderBy($orderTable, 'DESC')
                ->paginate(10);
        }
        return $data;
    }
    public function seo($rucEntidad, $period, $order, $rucContratista = '')
    {
        SEOTools::setTitle('Qullqita Qitapay - Proveedor con más de 3 contrataciones', false);
        if ($order == 1) {
            SEOTools::setDescription('Proveedor con más de 3 contrataciones - ' . 'Ruc Entidad : ' . $rucEntidad . ' - Período: ' . $period);
        }
        if ($order == 2) {
            SEOTools::setDescription('Proveedor con más de 3 contrataciones - ' . 'Ruc Entidad : ' . $rucEntidad . '- Ruc Contratista : ' . $rucContratista . ' - Período: ' . $period);
        }

        SEOTools::opengraph()->setUrl('https://qqperu.com/');
        SEOTools::setCanonical('https://qqperu.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://qqperu.com/images/iconQuiilquitaQatipay.jpeg');
    }
}
