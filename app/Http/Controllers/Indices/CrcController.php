<?php

namespace App\Http\Controllers\Indices;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class CrcController extends Controller
{
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
            return view('detail.indices.crc.firstDetail', compact('result', 'rucEntidad', 'period', 'busquedaPalabra', 'nameEntidad', 'primaryVariable', 'ruta', 'orderTable'));
        } else {
            abort(404);
        }
    }
    public function firstDetail($rucEntidad, $period, $orderTable)
    {

        $data = DB::table(DB::raw('osce_contrato a'))
            ->select('a.ruc_contratista', 'a.nombre_contratista', DB::raw('count(1) as cantidad'), DB::raw('sum(a.monto_contratado_item) as monto'))
            ->where('a.anno', '=', $period)
            ->where('a.ruc_entidad', '=', $rucEntidad)
            ->whereRaw('(a.fecha_suscripcion_contrato  - interval \'30 day\') <= (select min(op.fecha_inicio_vigencia) 
														 from osce_consorcio oco, osce_proveedor op 
														 where oco.ruc_consorcio=a.ruc_contratista and
																oco.ruc_miembro=op.ruc_proveedor)')
            ->groupBy(['a.ruc_contratista', 'a.nombre_contratista'])
            ->orderBy($orderTable, 'DESC')
            ->paginate(10);

        return $data;
    }

    public function second($rucContratista, $rucEntidad, $period, $nameEntidad, $ruc, $ruta, $primaryVariable, $orderTable, $nameRuc = 'Sin nombre', $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $orderTables = ['monto_contratado_item', 'fecha_suscripcion_contrato'];
        $validator = Validator::make(['period' => $period, 'rucEntidad' => $rucEntidad, 'rucContratista' => $rucContratista, 'orderTable' => $orderTable], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucEntidad' => ['required', 'integer'],
            'rucContratista' => ['required', 'integer'],
            'orderTable' => ['required', 'string', Rule::in($orderTables)],

        ]);
        if (!$validator->fails()) {
            $result = $this->secondDetail($rucContratista, $rucEntidad, $period, $orderTable);
            $this->seo($rucEntidad, $period, 2, $rucContratista);
            return view('detail.indices.crc.secondDetail', compact('result', 'rucContratista', 'rucEntidad', 'period', 'busquedaPalabra', 'nameEntidad', 'ruc', 'nameRuc', 'primaryVariable', 'orderTable', 'ruta'));
        } else {
            abort(404);
        }
    }
    public function secondDetail($rucContratista, $rucEntidad, $period, $orderTable)
    {

        $data = DB::table(DB::raw('osce_contrato a'))
            ->select('fecha_suscripcion_contrato', 'descripcion_proceso', 'num_contrato', 'urlcontrato', 'moneda', 'monto_contratado_item', 'ruc_miembro', DB::raw('(select distinct proveedor from osce_proveedor op2 where op2.ruc_proveedor=b.ruc_miembro)  as nombre'), DB::raw('(select min(fecha_inicio_vigencia) from osce_proveedor op2 where op2.ruc_proveedor=b.ruc_miembro)  as fechainicio'))
            ->crossJoin(DB::raw('osce_consorcio b'))
            ->where('a.anno', '=', $period)
            ->where('a.ruc_entidad', '=', $rucEntidad)
            ->where('a.ruc_contratista', '=', $rucContratista)
            ->whereRaw('(a.fecha_suscripcion_contrato  - interval \'30 day\') <= (select min(op.fecha_inicio_vigencia) 
														 from osce_consorcio oco, osce_proveedor op 
														 where oco.ruc_consorcio=a.ruc_contratista and
																oco.ruc_miembro=op.ruc_proveedor)')
            ->whereRaw('b.ruc_consorcio = a.ruc_contratista')
            ->orderBy($orderTable, 'DESC')
            ->paginate(10);

        return  $data;
    }
    public function seo($rucEntidad, $period, $order, $rucContratista = '')
    {
        SEOTools::setTitle('Qullqita Qitapay - Consorcio con proveedores recién creados', false);
        if ($order == 1) {
            SEOTools::setDescription('Consorcio con proveedores recién creados - ' . 'Ruc Entidad : ' . $rucEntidad . ' - Período: ' . $period);
        }
        if ($order == 2) {
            SEOTools::setDescription('Consorcio con proveedores recién creados - ' . 'Ruc Entidad : ' . $rucEntidad . '- Ruc Contratista : ' . $rucContratista . ' - Período: ' . $period);
        }

        SEOTools::opengraph()->setUrl('https://qqperu.com/');
        SEOTools::setCanonical('https://qqperu.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://qqperu.com/images/iconQuiilquitaQatipay.jpeg');
    }
}
