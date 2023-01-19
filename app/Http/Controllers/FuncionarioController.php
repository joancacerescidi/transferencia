<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    //


    public function firstDetail($idFuncionario, $nivel, $type, $name, $period, $ruc = 0, $busquedaPalabra = null)
    {

        $nivels = ['DCPD', 'DPRE', 'CDAF', 'CEDFA'];
        $types = ['orden-compra', 'contrato', 'consorcio'];
        $validator = Validator::make(['nivel' => $nivel, 'type' => $type, 'idFuncionario' => $idFuncionario, 'name' => $name], [
            'idFuncionario' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'nivel' => ['required', 'string', Rule::in($nivels)],
            'type' => ['required', 'string', Rule::in($types)]
        ]);
        $labelNivel = '';
        if ($nivel == 'DCPD') {
            $labelNivel = 'Donde se contrata a un pariente directamente';
        } else if ($nivel == 'DPRE') {
            $labelNivel = 'Donde un pariente es representante de una empresa';
        } else if ($nivel == 'CDAF') {
            $labelNivel = 'Contrataciones directas al funcionario';
        } else if ($nivel == 'CEDFA') {
            $labelNivel = 'Contrataciones a las empresas donde el funcionario es accionista';
        }
        $labelType = '';
        if ($type == 'orden-compra') {
            $labelType = 'Orden de Compra';
        } else if ($type == 'contrato') {
            $labelType = 'Contrato';
        } else if ($type == 'consorcio') {
            $labelType = 'Consorcio';
        }

        if (!$validator->fails()) {
            if ($nivel === 'DCPD') {
                if ($type === 'orden-compra') {
                    $data =  DB::table('funcionario_cargo AS fc')
                        ->crossJoin('funcionario_pariente AS fp')
                        ->crossJoin('osce_ordencompra AS oc')
                        ->select('fc.cargo', 'fc.nombreentidad', 'oc.fecha_emision', 'oc.ruc_contratista', 'fp.nombrepariente', 'fp.parentesco', 'oc.descripcion_orden', 'oc.orden', 'oc.objetocontractual', 'oc.moneda', 'oc.monto_total_original')
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.ruc', '=', DB::raw('oc.ruc_contratista'))
                        ->where('oc.fecha_emision', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_emision', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->where('oc.estadocontratacion', '!=', 'Anulada')
                        ->orderBy('oc.fecha_emision', 'DESC')
                        ->paginate(10);
                } else if ($type === 'contrato') {

                    $data =  DB::table('funcionario_cargo AS fc')
                        ->crossJoin('funcionario_pariente AS fp')
                        ->crossJoin('osce_contrato AS oc')
                        ->select('fc.cargo', 'fc.nombreentidad', 'oc.fecha_suscripcion_contrato', 'oc.ruc_contratista', 'fp.nombrepariente', 'fp.parentesco', 'oc.descripcion_proceso', 'oc.num_contrato', 'oc.urlcontrato', 'oc.moneda', 'oc.monto_contratado_item')
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.ruc', '=', DB::raw('oc.ruc_contratista'))
                        ->where('oc.fecha_suscripcion_contrato', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_suscripcion_contrato', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->orderBy('oc.fecha_suscripcion_contrato', 'DESC')
                        ->paginate(10);
                } else if ($type === 'consorcio') {
                    $data =  DB::table('funcionario_cargo AS fc')
                        ->crossJoin('funcionario_pariente AS fp')
                        ->crossJoin('osce_contrato AS oc')
                        ->crossJoin('osce_consorcio AS oo')
                        ->select('fc.cargo', 'fc.nombreentidad', 'oc.fecha_suscripcion_contrato', 'fp.ruc as rucpariente', 'fp.nombrepariente', 'fp.parentesco', 'oo.ruc_consorcio', 'oo.consorcio', 'oc.descripcion_proceso', 'oc.num_contrato', 'oc.urlcontrato', 'oc.moneda', 'oc.monto_contratado_item')
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.ruc', '=', DB::raw('oo.ruc_miembro'))
                        ->where('oo.ruc_consorcio', '=', DB::raw('oc.ruc_contratista'))
                        ->where('oc.fecha_suscripcion_contrato', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_suscripcion_contrato', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->orderBy('oc.fecha_suscripcion_contrato', 'DESC')
                        ->paginate(10);
                }
            } else if ($nivel === 'DPRE') {
                if ($type === 'orden-compra') {
                    $data =  DB::table('funcionario_cargo AS fc')
                        ->crossJoin('funcionario_pariente AS fp')
                        ->crossJoin('osce_ordencompra AS oc')
                        ->crossJoin('osce_conformacion_juridica AS ocj')
                        ->select(
                            'fc.cargo',
                            'fc.nombreentidad',
                            'oc.fecha_emision',
                            'fp.nrodoc',
                            'fp.nombrepariente',
                            'fp.parentesco',
                            'ocj.tipo_conf_juridica',
                            'oc.ruc_contratista',
                            'oc.nombre_razon_contratista',
                            'oc.descripcion_orden',
                            'oc.orden',
                            'oc.objetocontractual',
                            'oc.moneda',
                            'oc.monto_total_original'
                        )
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.nrodoc', '=', DB::raw('ocj.numero_documento'))
                        ->where('ocj.ruc', '=', DB::raw('oc.ruc_contratista'))
                        ->where('oc.fecha_emision', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_emision', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->where('oc.estadocontratacion', '!=', 'Anulada')
                        ->orderBy('oc.fecha_emision', 'DESC')
                        ->paginate(10);
                } else if ($type === 'contrato') {
                    $data =  DB::table('funcionario_cargo AS fc')
                        ->crossJoin('funcionario_pariente AS fp')
                        ->crossJoin('osce_contrato AS oc')
                        ->crossJoin('osce_conformacion_juridica AS ocj')
                        ->select(
                            'fc.cargo',
                            'fc.nombreentidad',
                            'oc.fecha_suscripcion_contrato',
                            'fp.nrodoc',
                            'fp.nombrepariente',
                            'fp.parentesco',
                            'ocj.tipo_conf_juridica',
                            'oc.ruc_contratista',
                            'oc.nombre_contratista',
                            'oc.descripcion_proceso',
                            'oc.num_contrato',
                            'oc.urlcontrato',
                            'oc.moneda',
                            'oc.monto_contratado_item'
                        )
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.nrodoc', '=', DB::raw('ocj.numero_documento'))
                        ->where('ocj.ruc', '=', DB::raw('oc.ruc_contratista'))
                        ->where('oc.fecha_suscripcion_contrato', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_suscripcion_contrato', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->orderBy('oc.fecha_suscripcion_contrato', 'DESC')
                        ->paginate(10);
                } else if ($type === 'consorcio') {

                    $data = DB::table('funcionario_cargo AS fc')
                        ->crossJoin('funcionario_pariente AS fp')
                        ->crossJoin('osce_contrato AS oc')
                        ->crossJoin('osce_conformacion_juridica AS ocj')
                        ->crossJoin('osce_consorcio AS oo')
                        ->select(
                            'fc.cargo',
                            'fc.nombreentidad',
                            'oc.fecha_suscripcion_contrato',
                            'fp.nrodoc',
                            'fp.nombrepariente',
                            'fp.parentesco',
                            'ocj.tipo_conf_juridica',
                            'oc.ruc_contratista',
                            'oc.nombre_contratista',
                            'oo.ruc_consorcio',
                            'oo.consorcio',
                            'oc.descripcion_proceso',
                            'oc.num_contrato',
                            'oc.urlcontrato',
                            'oc.moneda',
                            'oc.monto_contratado_item'
                        )
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.idfuncionario', '=', intval($idFuncionario))
                        ->where('fp.nrodoc', '=', DB::raw('ocj.numero_documento'))
                        ->where('ocj.ruc', '=', DB::raw('oo.ruc_miembro'))
                        ->where('oo.ruc_consorcio', '=', DB::raw('oc.ruc_contratista'))
                        ->where('oc.fecha_suscripcion_contrato', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_suscripcion_contrato', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->orderBy('oc.fecha_suscripcion_contrato', 'DESC')
                        ->paginate(10);
                }
            } else if ($nivel === 'CDAF') {
                if ($type === 'orden-compra') {

                    $data = DB::table('funcionario AS f')
                        ->crossJoin('funcionario_cargo AS fc')
                        ->crossJoin('osce_ordencompra AS oc')
                        ->select(
                            'fc.cargo',
                            'fc.nombreentidad',
                            'oc.fecha_emision',
                            'oc.descripcion_orden',
                            'oc.orden',
                            'oc.objetocontractual',
                            'oc.moneda',
                            'oc.monto_total_original'
                        )
                        ->where('oc.ruc_contratista', '=', $ruc)
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('oc.estadocontratacion', '!=', 'Anulada')
                        ->where('oc.fecha_emision', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_emision', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->orderBy('oc.fecha_emision', 'DESC')
                        ->paginate(10);
                } else if ($type === 'contrato') {
                    $data = DB::table('funcionario AS f')
                        ->crossJoin('funcionario_cargo AS fc')
                        ->crossJoin('osce_contrato AS oc')
                        ->select(
                            'fc.cargo',
                            'fc.nombreentidad',
                            'oc.fecha_suscripcion_contrato',
                            'oc.descripcion_proceso',
                            'oc.num_contrato',
                            'oc.urlcontrato',
                            'oc.moneda',
                            'oc.monto_contratado_item'
                        )
                        ->where('oc.ruc_contratista', '=', $ruc)
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('oc.fecha_suscripcion_contrato', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_suscripcion_contrato', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->orderBy('oc.fecha_suscripcion_contrato', 'DESC')
                        ->paginate(10);
                } else if ($type === 'consorcio') {
                    $data =  DB::table('funcionario AS f')
                        ->crossJoin('funcionario_cargo AS fc')
                        ->crossJoin('osce_contrato AS oc')
                        ->crossJoin('osce_consorcio AS oo')
                        ->select(
                            'fc.cargo',
                            'fc.nombreentidad',
                            'oc.fecha_suscripcion_contrato',
                            'oo.ruc_consorcio',
                            'oo.consorcio',
                            'oc.descripcion_proceso',
                            'oc.num_contrato',
                            'oc.urlcontrato',
                            'oc.moneda',
                            'oc.monto_contratado_item'
                        )
                        ->where('oo.ruc_miembro', '=',  $ruc)
                        ->where('oc.ruc_contratista', '=', DB::raw('oo.ruc_consorcio'))
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('oc.fecha_suscripcion_contrato', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_suscripcion_contrato', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->orderBy('oc.fecha_suscripcion_contrato', 'DESC')
                        ->paginate(10);
                }
            } else if ($nivel === 'CEDFA') {
                if ($type === 'orden-compra') {
                    $data = DB::table('funcionario AS f')
                        ->crossJoin('funcionario_cargo AS fc')
                        ->crossJoin('funcionario_acciones AS fa')
                        ->crossJoin('osce_ordencompra AS oc')
                        ->select(
                            'fc.cargo',
                            'fc.nombreentidad',
                            'oc.ruc_contratista',
                            'fa.acciones',
                            'oc.fecha_emision',
                            'oc.descripcion_orden',
                            'oc.orden',
                            'oc.objetocontractual',
                            'oc.moneda',
                            'oc.monto_total_original'
                        )
                        ->where('fa.ruc', '=', DB::raw('oc.ruc_contratista'))
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('fa.idfuncionario', '=', intval($idFuncionario))
                        ->where('fa.acciones', '>', 30)
                        ->where('oc.estadocontratacion', '=', 'Anulada')
                        ->where('oc.fecha_emision', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_emision', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->where('oc.fecha_emision', '>=', DB::raw('fa.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_emision', '<=', DB::raw('fa.fecha_fin'))
                                ->orWhereNull('fa.fecha_fin');
                        })
                        ->orderBy('fecha_emision', 'DESC')
                        ->paginate(10);
                } else if ($type === 'contrato') {
                    $data = DB::table('funcionario AS f')
                        ->crossJoin('funcionario_cargo AS fc')
                        ->crossJoin('funcionario_acciones AS fa')
                        ->crossJoin('osce_contrato AS oc')
                        ->select(
                            'fc.cargo',
                            'fc.nombreentidad',
                            'oc.ruc_contratista',
                            'fa.acciones',
                            'oc.fecha_suscripcion_contrato',
                            'oc.descripcion_proceso',
                            'oc.num_contrato',
                            'oc.urlcontrato',
                            'oc.moneda',
                            'oc.monto_contratado_item'
                        )
                        ->where('fa.ruc', '=', DB::raw('oc.ruc_contratista'))
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('fa.idfuncionario', '=', intval($idFuncionario))
                        ->where('fa.acciones', '>', 30)
                        ->where('oc.fecha_suscripcion_contrato', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_suscripcion_contrato', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->where('oc.fecha_suscripcion_contrato', '>=', DB::raw('fa.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_suscripcion_contrato', '<=', DB::raw('fa.fecha_fin'))
                                ->orWhereNull('fa.fecha_fin');
                        })
                        ->orderBy('fecha_suscripcion_contrato', 'DESC')
                        ->paginate(10);
                } else if ($type === 'consorcio') {
                    $data = DB::table('funcionario AS f')
                        ->crossJoin('funcionario_cargo AS fc')
                        ->crossJoin('funcionario_acciones AS fa')
                        ->crossJoin('osce_contrato AS oc')
                        ->crossJoin('osce_consorcio AS oo')
                        ->select(
                            'fc.cargo',
                            'fc.nombreentidad',
                            'oc.ruc_contratista',
                            'fa.acciones',
                            'oo.ruc_consorcio',
                            'oo.consorcio',
                            'oc.fecha_suscripcion_contrato',
                            'oc.descripcion_proceso',
                            'oc.num_contrato',
                            'oc.urlcontrato',
                            'oc.moneda',
                            'oc.monto_contratado_item'
                        )
                        ->where('fa.ruc', '=', DB::raw('oo.ruc_miembro'))
                        ->where('oc.ruc_contratista', '=', DB::raw('oo.ruc_consorcio'))
                        ->where('fc.idfuncionario', '=', intval($idFuncionario))
                        ->where('fa.idfuncionario', '=', intval($idFuncionario))
                        ->where('fa.acciones', '>', 30)
                        ->where('oc.fecha_suscripcion_contrato', '>=', DB::raw('fc.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_suscripcion_contrato', '<=', DB::raw('fc.fecha_fin'))
                                ->orWhereNull('fc.fecha_fin');
                        })
                        ->where('oc.fecha_suscripcion_contrato', '>=', DB::raw('fa.fecha_inicio'))
                        ->where(function ($query) {
                            $query->where('oc.fecha_suscripcion_contrato', '<=', DB::raw('fa.fecha_fin'))
                                ->orWhereNull('fa.fecha_fin');
                        })
                        ->orderBy('fecha_suscripcion_contrato', 'DESC')
                        ->paginate(10);
                }
            }

            return view('detail.funcionario.firstDetail', compact('data', 'period', 'nivel', 'type', 'name', 'labelNivel', 'labelType', 'busquedaPalabra'));
        } else {
            abort(404);
        }
    }
}
