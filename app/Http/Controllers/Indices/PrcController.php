<?php

namespace App\Http\Controllers\Indices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PrcController extends Controller
{
    //

    public function first($rucEntidad, $period, $nameEntidad, $ruta, $primaryVariable, $orderTable, $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $orderTables = ['cantidad', 'monto'];
        $validator = Validator::make(['period' => $period, 'rucEntidad' => $rucEntidad, 'orderTable'=> $orderTable], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'orderTable' => ['required', 'string', Rule::in($orderTables)],
            'rucEntidad' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->firstDetail($rucEntidad, $period, $orderTable);
            return view('detail.indices.prc.firstDetail', compact('result', 'rucEntidad', 'period', 'busquedaPalabra', 'nameEntidad', 'ruta', 'primaryVariable', 'orderTable'));
        } else {
            abort(404);
        }
    }
    public function firstDetail($rucEntidad, $period, $orderTable)
    {
        $data = DB::table(DB::raw("(select oo.ruc_contratista as ruc, oo.nombre_razon_contratista as nombre,  count(1) as cantidad, sum(oo.monto_total_original) as monto
                FROM osce_ordencompra oo  
                where oo.anno='$period'
                and oo.ruc_entidad='$rucEntidad'
                and (select min(fecha_inicio_vigencia) from  osce_proveedor b where b.ruc_proveedor=oo.ruc_contratista) > (oo.fecha_emision  - interval '30 day' )
                group by oo.ruc_contratista, oo.nombre_razon_contratista
                union
                select oo.ruc_contratista, oo.nombre_contratista, count(1), sum(oo.monto_contratado_item) 
                FROM osce_contrato oo  
                where oo.anno='$period'
                and oo.ruc_entidad='$rucEntidad'
                and (select min(fecha_inicio_vigencia)  from  osce_proveedor b where b.ruc_proveedor=oo.ruc_contratista) > (oo.fecha_suscripcion_contrato  - interval '30 day' )
                group by oo.ruc_contratista, oo.nombre_contratista) a"))
            ->select('ruc', 'nombre', DB::raw('sum(cantidad) as cantidad'), DB::raw('sum(monto) as monto'))
            ->groupBy(['ruc', 'nombre'])
            ->orderBy($orderTable, 'DESC')
            ->paginate(10);
        return $data;
    }

    public function second($rucContratista, $rucEntidad, $period, $filter, $nameEntidad, $ruc, $nameRuc, $ruta,  $primaryVariable, $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $filters = ['orden-compra', 'contrato'];
        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista, 'rucEntidad' => $rucEntidad, 'filter' => $filter], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer'],
            'rucEntidad' => ['required', 'integer'],
            'filter' => ['required', 'string', Rule::in($filters)],
        ]);
        if (!$validator->fails()) {
            $resultDate = $this->fechaRegistroProveedor($rucEntidad);
            $result = $this->secondDetail($rucEntidad, $rucContratista, $period, $filter);

            return view('detail.indices.prc.secondDetail', compact('result', 'rucEntidad', 'rucContratista', 'period', 'filter', 'resultDate', 'busquedaPalabra', 'nameEntidad', 'ruc', 'nameRuc', 'ruta', 'primaryVariable'));
        } else {
            abort(404);
        }
    }
    public function secondDetail($rucEntidad, $rucContratista, $period, $filter)
    {
        if ($filter == 'orden-compra') {
            $data = DB::table(DB::raw('osce_ordencompra oo'))
                ->select('fecha_emision', 'descripcion_orden', 'orden', 'objetocontractual', 'moneda', 'monto_total_original')
                ->where('anno', '=', $period)
                ->where('ruc_entidad', '=', $rucEntidad)
                ->where('ruc_contratista', '=', $rucContratista)
                ->whereRaw('(select min(fecha_inicio_vigencia) from  osce_proveedor b where b.ruc_proveedor=oo.ruc_contratista) > (oo.fecha_emision  - interval \'30 day\' )')
                ->orderBy('fecha_emision', 'ASC')
                ->paginate(10);
        } else if ($filter == 'contrato') {
            $data = DB::table(DB::raw('osce_contrato oo'))
                ->select('fecha_suscripcion_contrato', 'descripcion_proceso', 'num_contrato', 'urlcontrato', 'moneda', 'monto_contratado_item')
                ->where('anno', '=', $period)
                ->where('ruc_entidad', '=', $rucEntidad)
                ->where('ruc_contratista', '=', $rucContratista)
                ->whereRaw('(select min(fecha_inicio_vigencia) from  osce_proveedor b where b.ruc_proveedor=oo.ruc_contratista) > (oo.fecha_suscripcion_contrato  - interval \'30 day\' )')
                ->orderBy('fecha_suscripcion_contrato', 'ASC')
                ->paginate(10);
        }
        return $data;
    }

    public function fechaRegistroProveedor($rucEntidad)
    {
        $dataFechaRegistroProveedor = DB::table('osce_proveedor')
            ->select(DB::raw('min(fecha_inicio_vigencia)'))
            ->where('osce_proveedor.ruc_proveedor', '=', $rucEntidad)->get();
        return $dataFechaRegistroProveedor;
    }
}
