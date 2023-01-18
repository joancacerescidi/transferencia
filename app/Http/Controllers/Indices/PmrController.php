<?php

namespace App\Http\Controllers\Indices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PmrController extends Controller
{
    //
    public function first($rucEntidad, $period,  $nameEntidad, $ruta, $primaryVariable, $orderTable, $busquedaPalabra = null)
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
            return view('detail.indices.pmr.firstDetail', compact('result', 'rucEntidad', 'period', 'busquedaPalabra', 'nameEntidad', 'ruta', 'primaryVariable', 'orderTable'));
        } else {
            abort(404);
        }
    }
    public function firstDetail($rucEntidad, $period, $orderTable)
    {
        $data
            = DB::table(DB::raw('osce_contrato oc'))
            ->select('oc.ruc_contratista', 'oc.nombre_contratista', DB::raw('count(1) as cantidad'), DB::raw('sum(oc.monto_contratado_item) as monto'))
            ->where('oc.anno', '=', $period)
            ->where('oc.ruc_entidad', '=', $rucEntidad)
            ->groupBy(['oc.ruc_contratista', 'oc.nombre_contratista'])
            ->orderBy($orderTable, 'DESC')
            ->paginate(10);

        return $data;
    }
    public function second($rucContratista, $rucEntidad, $period,  $nameEntidad, $ruc, $nameRuc, $ruta, $primaryVariable, $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista, 'rucEntidad' => $rucEntidad], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer'],
            'rucEntidad' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->secondDetail($rucEntidad, $rucContratista, $period);
            $conformacion = $this->conformacionJuridica($rucContratista);
            return view('detail.indices.pmr.secondDetail', compact('result', 'period', 'rucEntidad', 'conformacion', 'busquedaPalabra', 'nameEntidad', 'ruc', 'nameRuc', 'ruta', 'primaryVariable'));
        } else {
            abort(404);
        }
    }
    public function secondDetail($rucEntidad, $rucContratista, $period)
    {
        $data =
            DB::table(DB::raw('osce_contrato oc'))
            ->distinct()
            ->select(DB::raw('(num_contrato, oc.num_item) as numero_contrato'), 'fecha_suscripcion_contrato', 'descripcion_proceso', 'urlcontrato', 'moneda', 'monto_contratado_item', DB::raw('(
		select
			string_agg(
				\'Postor: RUC:\' || op.ruc_postor || \' Nombre: \' || op.postor || \' Representante: documento: \' || ocj.numero_documento || \'  Nombre: \' || ocj.nombre || \' Relacion: \' || ocj.tipo_conf_juridica,
				\'*\'
			)
		from
			osce_postor op,
			osce_conformacion_juridica ocj
		where
			op.codigo_convocatoria = oc.codigoconvocatoria
			and op.n_item = oc.num_item
			and op.ruc_postor <> oc.ruc_contratista
			and ocj.ruc = op.ruc_postor
	) as rep1'))
            ->where([['oc.anno', $period], ['oc.ruc_entidad', $rucEntidad], ['oc.ruc_contratista', $rucContratista]])
            ->orderBy('fecha_suscripcion_contrato', 'ASC')
            ->paginate(10);

        return $data;
    }
    public function conformacionJuridica($rucContratista)
    {
        $data =
            DB::table(DB::raw('osce_conformacion_juridica ocj1'))
            ->select('ocj1.numero_documento', 'ocj1.nombre', 'ocj1.tipo_conf_juridica')
            ->where('ocj1.ruc', '=', $rucContratista)
            ->get();
        return $data;
    }
}
