<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    //
    public function ordenCompraFirst($rucContratista, $period,  $nombre = 'Sin nombre', $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->ordenCompraFirstDetail($rucContratista, $period);
            return view('detail.proveedor.orden-compra.firstDetail', compact('result', 'rucContratista', 'period', 'nombre', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function ordenCompraFirstDetail($rucContratista, $period)
    {
        $data = DB::table(DB::raw('osce_ordencompra oc'))
            ->select('oc.ruc_entidad', 'oc.entidad', DB::raw('count(1) as cantidad'), DB::raw('sum(oc.monto_total_original) as monto'))
            ->where('oc.anno', '=', $period)
            ->where('oc.ruc_contratista', '=', $rucContratista)
            ->where('oc.estadocontratacion', '!=', 'Anulada')
            ->groupBy('oc.ruc_entidad', 'oc.entidad')
            ->orderBy('cantidad', 'desc')
            ->paginate(10);

        return  $data;
    }
    public function ordenCompraSecond($rucEntidad, $rucContratista, $period, $ruc, $rucNombre, $nombre = 'Sin nombre', $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];

        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista, 'rucEntidad' => $rucEntidad], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer'],
            'rucEntidad' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->ordenCompraSecondDetail($rucEntidad, $rucContratista, $period);
            return view('detail.proveedor.orden-compra.secondDetail', compact('result', 'rucEntidad', 'rucContratista', 'period', 'ruc', 'rucNombre', 'nombre', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function ordenCompraSecondDetail($rucEntidad, $rucContratista, $period)
    {

        $data = DB::table(DB::raw('osce_ordencompra oc'))
            ->select('fecha_emision', 'descripcion_orden', 'orden', 'objetocontractual', 'moneda', 'monto_total_original')
            ->where([['oc.anno', $period], ['oc.ruc_contratista', $rucContratista], ['oc.ruc_entidad', $rucEntidad], ['oc.estadocontratacion', '<>', 'Anulada']])
            ->orderBy('oc.fecha_emision', 'ASC')
            ->paginate(10);

        return  $data;
    }
    public function contratoFirst($rucContratista, $period, $nombre = 'Sin nombre', $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->contratoFirstDetail($rucContratista, $period);
            return view('detail.proveedor.contrato.firstDetail', compact('result', 'rucContratista', 'period', 'nombre', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function contratoFirstDetail($rucContratista, $period)
    {
        $data = DB::table(DB::raw('osce_contrato oc'))
            ->select('oc.ruc_entidad', 'oc.nombre_entidad', DB::raw('count(1) as cantidad'), DB::raw('sum(oc.monto_contratado_item) as monto'))
            ->where([['oc.anno', $period], ['oc.ruc_contratista', $rucContratista]])
            ->groupBy(['oc.ruc_entidad', 'oc.nombre_entidad'])
            ->orderByRaw('cantidad DESC')
            ->paginate(10);
        return $data;
    }
    public function contratoSecond($rucEntidad, $rucContratista, $period, $ruc, $rucNombre, $nombre = 'Sin nombre', $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];

        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista, 'rucEntidad' => $rucEntidad], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer'],
            'rucEntidad' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->contratoSecondDetail($rucEntidad, $rucContratista, $period);
            return view('detail.proveedor.contrato.secondDetail', compact('result', 'rucEntidad', 'rucContratista', 'period', 'ruc', 'rucNombre', 'nombre', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function contratoSecondDetail($rucEntidad, $rucContratista, $period)
    {
        $data = DB::table(DB::raw('osce_contrato oc'))
            ->select('fecha_suscripcion_contrato', 'descripcion_proceso', 'num_contrato', 'urlcontrato', 'moneda', 'monto_contratado_item')
            ->where([['oc.anno', $period], ['oc.ruc_contratista', $rucContratista], ['oc.ruc_entidad', $rucEntidad]])
            ->orderBy('fecha_suscripcion_contrato', 'ASC')
            ->paginate(10);
        return $data;
    }

    public function consorcioFirst($rucContratista, $period, $filter, $nombre = 'Sin nombre', $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $filters = ['orden-compra', 'contrato'];
        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista, 'filter' => $filter], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer'],
            'filter' => ['required', 'string', Rule::in($filters)],
        ]);
        if (!$validator->fails()) {
            $result = $this->consorcioFirstDetail($rucContratista, $period, $filter);

            return view('detail.proveedor.consorcio.firstDetail', compact('result', 'rucContratista', 'period', 'filter', 'nombre', 'busquedaPalabra'));
        } else {

            abort(404);
        }
    }
    public function consorcioFirstDetail($rucContratista, $period, $filter)
    {
        if ($filter == 'orden-compra') {
            $data = DB::table('osce_ordencompra')
                ->crossJoin('osce_consorcio')
                ->select('osce_ordencompra.ruc_entidad', 'osce_ordencompra.entidad', DB::raw("count(1) as cantidad"), DB::raw("sum(osce_ordencompra.monto_total_original) as monto"))
                ->where('osce_ordencompra.anno', '=', $period)
                ->where('osce_ordencompra.ruc_contratista', '=', DB::raw('osce_consorcio.ruc_consorcio'))
                ->where('osce_consorcio.ruc_miembro', '=', $rucContratista)
                ->groupBy('osce_ordencompra.ruc_entidad', 'osce_ordencompra.entidad')
                ->orderBy('cantidad', 'desc')
                ->paginate(10);
        } else if ($filter == 'contrato') {
            $data = DB::table('osce_contrato')
                ->crossJoin('osce_consorcio')
                ->select('osce_contrato.ruc_entidad', 'osce_contrato.nombre_entidad', DB::raw("count(1) as cantidad"), DB::raw("sum(osce_contrato.monto_contratado_item) as monto"))
                ->where('osce_contrato.anno', '=', $period)
                ->where('osce_contrato.ruc_contratista', '=', DB::raw('osce_consorcio.ruc_consorcio'))
                ->where('osce_consorcio.ruc_miembro', '=', $rucContratista)
                ->groupBy('osce_contrato.ruc_entidad', 'osce_contrato.nombre_entidad')
                ->orderBy('cantidad', 'desc')
                ->paginate(10);
        }
        return $data;
    }
    public function consorcioSecond($rucEntidad, $rucContratista, $period, $filter, $ruc, $rucNombre, $nombre = 'Sin nombre', $busquedaPalabra = null)
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
            $result = $this->consorcioSecondDetail($rucEntidad, $rucContratista, $period, $filter);
            return view('detail.proveedor.consorcio.secondDetail', compact('result', 'rucEntidad', 'rucContratista', 'period', 'filter', 'ruc', 'rucNombre', 'nombre', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function consorcioSecondDetail($rucEntidad, $rucContratista, $period, $filter)
    {
        if ($filter == 'orden-compra') {
            $data = DB::table(DB::raw('osce_ordencompra oc'))
                ->crossJoin(DB::raw('osce_consorcio oco'))
                ->select('fecha_emision', 'descripcion_orden', 'orden', 'objetocontractual', 'moneda', 'monto_total_original', 'oco.ruc_consorcio', 'oco.consorcio as nombreconsorcio')
                ->where('oc.anno', '=', $period)
                ->where('oc.ruc_contratista', '=', DB::raw('oco.ruc_consorcio'))
                ->where('oco.ruc_miembro', '=', $rucContratista)
                ->where('oc.ruc_entidad', '=', $rucEntidad)
                ->orderBy('fecha_emision', 'asc')
                ->paginate(10);
        } else if ($filter == 'contrato') {
            $data = DB::table(DB::raw('osce_contrato oc'))
                ->crossJoin(DB::raw('osce_consorcio oco'))
                ->select('fecha_suscripcion_contrato', 'descripcion_proceso', 'num_contrato', 'urlcontrato', 'moneda', 'monto_contratado_item', 'oco.ruc_consorcio', 'oco.consorcio as nombreconsorcio')
                ->where('oc.anno', '=', $period)
                ->where('oc.ruc_contratista', '=', DB::raw('oco.ruc_consorcio'))
                ->where('oco.ruc_miembro', '=', $rucContratista)
                ->where('oc.ruc_entidad', '=', $rucEntidad)
                ->orderBy('fecha_suscripcion_contrato', 'asc')
                ->paginate(10);
        }
        return $data;
    }
    public function sancionesFirst($rucContratista, $period, $nombre = 'Sin nombre', $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->sancionesFirstDetail($rucContratista, $period);

            return view('detail.proveedor.sanciones.firstDetail', compact('result', 'rucContratista', 'period', 'nombre', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function sancionesFirstDetail($rucContratista, $period)
    {

        $data = DB::table(DB::raw('osce_sancionada os'))
            ->select('desde', 'hasta', 'resolucion', 'motivo', 'monto')
            ->whereRaw('date_part(\'year\',desde) = ? ', [$period])
            ->where('ruc', '=', $rucContratista)
            ->paginate(10);
        return $data;
    }
    public function contratoResueltoFirst($rucContratista, $period, $nombre = 'Sin nombre', $busquedaPalabra = null)
    {

        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->contratoResueltoFirstDetail($rucContratista, $period);
            return view('detail.proveedor.contratoResuelto.firstDetail', compact('result', 'rucContratista', 'period', 'nombre', 'busquedaPalabra'));
        } else {

            abort(404);
        }
    }
    public function contratoResueltoFirstDetail($rucContratista, $period)
    {
        $data = DB::table(DB::raw('osce_contrato oc'))
            ->select('oc.ruc_entidad', 'oc.nombre_entidad', DB::raw('count(1) as cantidad'), DB::raw('sum(oc.monto_contratado_item) as monto'))
            ->where([['oc.anno', $period], ['oc.ruc_contratista', $rucContratista], ['oc.tieneresolucion', 'SI']])
            ->groupBy(['oc.ruc_entidad', 'oc.nombre_entidad'])
            ->orderByRaw('cantidad DESC')
            ->paginate(10);
        return $data;
    }
    public function contratoResueltoSecond($rucEntidad, $rucContratista, $period, $ruc, $rucNombre, $nombre = 'Sin nombre', $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];

        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista, 'rucEntidad' => $rucEntidad], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer'],
            'rucEntidad' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->contratoResueltoSecondDetail($rucEntidad, $rucContratista, $period);
            return view('detail.proveedor.contratoResuelto.secondDetail', compact('result', 'rucEntidad', 'rucContratista', 'period', 'ruc', 'rucNombre', 'nombre', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function contratoResueltoSecondDetail($rucEntidad, $rucContratista, $period)
    {

        $data = DB::table(DB::raw('osce_contrato oc'))
            ->select('fecha_suscripcion_contrato', 'descripcion_proceso', 'num_contrato', 'urlcontrato', 'moneda', 'monto_contratado_item')
            ->where([['oc.anno', $period], ['oc.ruc_contratista', $rucContratista], ['oc.ruc_entidad', $rucEntidad], ['oc.tieneresolucion', 'SI']])
            ->orderBy('fecha_suscripcion_contrato', 'ASC')
            ->paginate(10);
        return $data;
    }
    public  function postulacionesFirst($rucContratista, $period, $nombre = 'Sin nombre', $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->postulacionesFirstDetail($rucContratista, $period);
            return view('detail.proveedor.postulacion.firstDetail', compact('result', 'rucContratista', 'period', 'nombre', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public  function postulacionesFirstDetail($rucContratista, $period)
    {
        $data = DB::table(DB::raw('osce_postor op'))
            ->select('oc.entidad_ruc', 'oc.entidad', DB::raw('count(1) as cantidad'))
            ->crossJoin(DB::raw('osce_convocatoria oc'))
            ->whereRaw('date_part(\'year\',op.fecha_convocatoria) = ? ', [$period])
            ->where('op.ruc_postor', '=', $rucContratista)
            ->whereRaw('op.codigo_convocatoria = oc.codigo_convocatoria')
            ->whereRaw('op.n_item = oc.n_item')
            ->groupBy(['oc.entidad_ruc', 'oc.entidad'])
            ->orderByRaw('cantidad DESC')
            ->paginate(10);

        return $data;
    }
    public function postulacionesSecond($rucEntidad, $rucContratista, $period, $ruc, $rucNombre, $nombre = 'Sin nombre', $busquedaPalabra = null)
    {

        $periods = [2018, 2019, 2020, 2021, 2022, 2023];

        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista, 'rucEntidad' => $rucEntidad], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer'],
            'rucEntidad' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->postulacionesSecondDetail($rucEntidad, $rucContratista, $period);
            return view('detail.proveedor.postulacion.secondDetail', compact('result', 'ruc', 'rucEntidad', 'rucContratista', 'rucNombre', 'nombre', 'ruc', 'rucNombre', 'nombre', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function postulacionesSecondDetail($rucEntidad, $rucContratista, $period)
    {
        $data = DB::table(DB::raw('osce_postor op'))
            ->select('oc.proceso', 'oc.objeto_contractual', 'oc.descripcion_item', 'oc.moneda', 'oc.monto_referencial_item', 'oc.fecha_convocatoria', 'oc.fecha_presentacion_propuesta')
            ->crossJoin(DB::raw('osce_convocatoria oc'))
            ->whereRaw('date_part(\'year\',op.fecha_convocatoria) = ? ', [$period])
            ->where('op.ruc_postor', '=', $rucContratista)
            ->whereRaw('op.codigo_convocatoria = oc.codigo_convocatoria')
            ->whereRaw('op.n_item = oc.n_item')
            ->where('oc.entidad_ruc', '=', $rucEntidad)
            ->orderBy('oc.fecha_convocatoria', 'ASC')
            ->paginate(10);
        return $data;
    }
    public function postulacionesMismoRepresentanteFirst($rucContratista, $period, $nombre = 'Sin nombre', $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->postulacionesMismoRepresentanteFirstDetail($rucContratista, $period);
            return view('detail.proveedor.postulacionMismoRepresenante.firstDetail', compact('result', 'rucContratista', 'period', 'nombre', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function postulacionesMismoRepresentanteFirstDetail($rucContratista, $period)
    {

        $data =
            DB::table(DB::raw('osce_postor op'))
            ->select('oc.entidad_ruc', 'oc.entidad', DB::raw('count(1) as cantidad'))
            ->crossJoin(DB::raw('osce_postor op1'))
            ->crossJoin(DB::raw('osce_conformacion_juridica ocj'))
            ->crossJoin(DB::raw('osce_conformacion_juridica ocj1'))
            ->crossJoin(DB::raw('osce_convocatoria oc'))
            ->whereRaw('date_part(\'year\',op.fecha_convocatoria) = ? ', [$period])
            ->where('op.ruc_postor', '=', $rucContratista)
            ->whereRaw('op1.codigo_convocatoria = op.codigo_convocatoria')
            ->whereRaw('op1.n_item = op.n_item')
            ->whereRaw('ocj.ruc = op.ruc_postor')
            ->whereRaw('ocj1.ruc = op1.ruc_postor')
            ->whereRaw('ocj1.tipo_documento = ocj.tipo_documento')
            ->whereRaw('ocj1.numero_documento = ocj.numero_documento')
            ->whereRaw('oc.codigo_convocatoria = op.codigo_convocatoria')
            ->whereRaw('oc.n_item = op.n_item')
            ->groupBy(['oc.entidad_ruc', 'oc.entidad'])
            ->orderByRaw('cantidad DESC')
            ->paginate(10);

        return $data;
    }
    public function postulacionesMismoRepresentanteSecond($rucEntidad, $rucContratista, $period, $ruc, $rucNombre, $nombre = 'Sin nombre', $busquedaPalabra = null)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];

        $validator = Validator::make(['period' => $period, 'rucContratista' => $rucContratista, 'rucEntidad' => $rucEntidad], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'rucContratista' => ['required', 'integer'],
            'rucEntidad' => ['required', 'integer']
        ]);
        if (!$validator->fails()) {
            $result = $this->postulacionesMismoRepresentanteSecondDetail($rucEntidad, $rucContratista, $period);
            $conformacion = $this->conformacionJuridica($rucContratista);
            return view('detail.proveedor.postulacionMismoRepresenante.secondDetail', compact('result', 'rucEntidad', 'rucContratista', 'conformacion', 'period', 'ruc', 'rucNombre', 'nombre', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
    public function postulacionesMismoRepresentanteSecondDetail($rucEntidad, $rucContratista, $period)
    {

        $data = DB::table(DB::raw('osce_contrato oc'))
            ->distinct()
            ->select(DB::raw('(num_contrato,  oc.num_item) as numero_contrato'), 'fecha_suscripcion_contrato', 'descripcion_proceso', 'urlcontrato', 'moneda', 'monto_contratado_item', DB::raw('(select string_agg(\'Postor: RUC:\' || op.ruc_postor || \' Nombre: \' || op.postor || \' Representante: documento: \' || ocj.numero_documento || \'  Nombre: \' || ocj.nombre || \' Relacion: \' || ocj.tipo_conf_juridica, \'*\') 
from osce_postor op, osce_conformacion_juridica ocj
	 where op.codigo_convocatoria=oc.codigoconvocatoria
	       and op.n_item=oc.num_item
	 	   and op.ruc_postor<>oc.ruc_contratista
	       and ocj.ruc=op.ruc_postor) as rep1'))
            ->where([['oc.anno', $period], ['oc.ruc_entidad', $rucEntidad], ['oc.ruc_contratista', $rucContratista]])
            ->orderBy('fecha_suscripcion_contrato', 'ASC')
            ->paginate(10);

        return $data;
    }
    public function conformacionJuridica($rucContratista)
    {

        $data = DB::table('osce_conformacion_juridica')
            ->select('osce_conformacion_juridica.numero_documento', 'osce_conformacion_juridica.nombre', 'osce_conformacion_juridica.tipo_conf_juridica')
            ->where('osce_conformacion_juridica.ruc', '=', $rucContratista)
            ->get();

        return $data;
    }
}
