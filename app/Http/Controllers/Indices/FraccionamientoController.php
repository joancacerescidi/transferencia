<?php

namespace App\Http\Controllers\Indices;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class FraccionamientoController extends Controller
{
    //
    public function first($rucEntidad, $period, $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $validator = Validator::make(['period' => $period, 'rucEntidad' => $rucEntidad], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucEntidad' => ['required', 'integer'],
        ]);
        if (!$validator->fails()) {
            $result = $this->firstDetail($rucEntidad, $period);
            return view('detail.indices.fraccionamiento.firstDetail', compact('result', 'rucEntidad', 'period', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function firstDetail($rucEntidad, $period)
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
            ->orderByRaw('cantidad DESC')
            ->paginate(10);

        return $data;
    }
    public function second($rucContratista, $rucEntidad, $period, $filter, $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $filters = ['orden-compra', 'contrato'];
        $validator = Validator::make(['period' => $period, 'rucEntidad' => $rucEntidad, 'rucContratista' => $rucContratista, 'filter' => $filter], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucEntidad' => ['required', 'integer'],
            'rucContratista' => ['required', 'integer'],
            'filter' => ['required', 'string', Rule::in($filters)],
        ]);
        if (!$validator->fails()) {
            $result = $this->secondDetail($rucContratista, $rucEntidad, $period, $filter);
            // dd($result);
            return view('detail.indices.fraccionamiento.secondDetail', compact('result', 'filter', 'period', 'rucContratista', 'rucEntidad', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function secondDetail($rucContratista, $rucEntidad, $period, $filter)
    {
        if ($filter == 'orden-compra') {
            $data = DB::table('osce_ordencompra')
                ->select('fecha_emision', 'descripcion_orden', 'orden', 'objetocontractual', 'moneda', 'monto_total_original')
                ->where('anno', '=', $period)
                ->where('ruc_entidad', '=', $rucEntidad)
                ->where('ruc_contratista', '=', $rucContratista)
                ->orderBy('fecha_emision', 'asc')
                ->paginate(10);
        } else if ($filter == 'contrato') {
            $data = DB::table('osce_contrato')
                ->select('fecha_suscripcion_contrato', 'descripcion_proceso', 'num_contrato', 'urlcontrato', 'moneda', 'monto_contratado_item')
                ->where('anno', '=', $period)
                ->where('ruc_entidad', '=', $rucEntidad)
                ->where('ruc_contratista', '=', $rucContratista)
                ->orderBy('fecha_suscripcion_contrato', 'asc')
                ->paginate(10);
        }

        return $data;
    }
}
