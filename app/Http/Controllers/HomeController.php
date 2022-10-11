<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class HomeController extends Controller
{
    //
    public function index()
    {

        $dataTop =  DB::select('select  "totalperiodoentidad"."ruc_entidad", "totalperiodoentidad"."nombre_entidad", "totalperiodoentidad"."montoordencompra", 
                               "totalperiodoentidad"."montocontrato", "totalperiodoentidad"."montoFRA" , "totalperiodoentidad"."montoPRC", 
                               "totalperiodoentidad"."montoPMR", "totalperiodoentidad"."montoCRC", "totalperiodoentidad"."montoADI" , "totalperiodoentidad"."montoPCP", 
                               "totalperiodoentidad"."montoCPP", "totalperiodoentidad"."montoCOF", "totalperiodoentidad"."IndiceFRA", "totalperiodoentidad"."IndicePRC", 
                               "totalperiodoentidad"."IndicePMR", "totalperiodoentidad"."IndiceCRC" , "totalperiodoentidad"."IndiceADI", "totalperiodoentidad"."IndicePCP", 
                               "totalperiodoentidad"."IndiceCPP" , "totalperiodoentidad"."IndiceCOF" , "totalperiodoentidad"."IndiceTCO", "totalperiodoentidad"."IndiceTEJ",
                               "totalperiodoentidad"."montotco", "totalperiodoentidad"."montotej"
                               from totalperiodoentidad 
                               order by "totalperiodoentidad"."IndiceTCO" desc
                               limit 20;');

        $result = $this->convertData($dataTop);

        return view('home', compact('result'));
    }
    public function busqueda(Request $request)
    {
        $palabra = $request->get('clave');

        $dataSearch = DB::select('select  "totalperiodoentidad"."ruc_entidad", "totalperiodoentidad"."nombre_entidad", "totalperiodoentidad"."montoordencompra", 
                                      "totalperiodoentidad"."montocontrato", "totalperiodoentidad"."montoFRA" , "totalperiodoentidad"."montoPRC", 
                                      "totalperiodoentidad"."montoPMR", "totalperiodoentidad"."montoCRC", "totalperiodoentidad"."montoADI" , "totalperiodoentidad"."montoPCP", 
                                      "totalperiodoentidad"."montoCPP", "totalperiodoentidad"."montoCOF", "totalperiodoentidad"."IndiceFRA", "totalperiodoentidad"."IndicePRC", 
                                      "totalperiodoentidad"."IndicePMR", "totalperiodoentidad"."IndiceCRC" , "totalperiodoentidad"."IndiceADI", "totalperiodoentidad"."IndicePCP", 
                                      "totalperiodoentidad"."IndiceCPP" , "totalperiodoentidad"."IndiceCOF" , "totalperiodoentidad"."IndiceTCO", "totalperiodoentidad"."IndiceTEJ",
                                      "totalperiodoentidad"."montotco" ,"totalperiodoentidad"."montotej" 
                                      from totalperiodoentidad 
                                      where "totalperiodoentidad"."nombre_entidad" like ? or "totalperiodoentidad"."ruc_entidad" = ?', ['%' . strtoupper($palabra) . '%', strtoupper($palabra)]);
        $result = $this->convertData($dataSearch);

        return view('search', compact('result', 'palabra'));
    }
    public function detalle1($ruc, $type , $entidad)
    {

        $queryType = '';
        $title = '';
        switch ($type) {
            case 'FRA':
                $queryType = 'fra_proveedor';
                $title = 'Fraccionamiento';
                break;
            case 'PRC':
                $queryType = 'prc_proveedor';
                $title = 'Proveedor recién creado';
                break;
            case 'PMR':
                $queryType = 'pmr_proveedor_contrato';
                $title = 'Proveedor con mismo representante';
                break;
            case 'CRC':
                $queryType = 'crc_proveedor_contrato';
                $title = 'Consorcio con proveedores recién creados';
                break;
            case 'ADI':
                $queryType = 'adi_proveedor_ordencompra';
                $title = 'Adjudicaciones directas';
                break;
            case 'PCP':
                $queryType = '';
                $title = 'Personas con prohibición de contratar';
                break;
            case 'CPP':
                $queryType = '';
                $title = 'CPP';
                break;
            case 'COF':
                $queryType = '';
                $title = 'Consorcios fantasma';
                break;
        }

        $dataDetalle1 = DB::select("SELECT periodo, ruc_entidad, nombre_entidad, ruc_contratista, nombre_contratista, monto, cantidad FROM public.$queryType where ruc_entidad=? order by monto", [$ruc]);

        foreach ($dataDetalle1 as $data) {
            if ($data->nombre_contratista == null) {
                $data->nombre_contratista = 'Sin nombre';
            }
        }
        return view('detail', compact('dataDetalle1', 'title', 'type', 'entidad'));
    }
    public function detalle2($rucEntidad, $rucContratista, $type, $contratista, $entidad)
    {

        $compra = '';
        $contrato = '';
        $title = '';

        // 0 -> ningin quer

        // 1 -> dos quiery

        // 3 -> orden

        // 4 -> contrato

        $object1 = new stdClass();

        switch ($type) {
            case 'FRA':
                $compra = 'fra_osce_ordencompra';
                $contrato = 'fra_osce_contrato';
                $title = 'Fraccionamiento';
                $type = 1;
                $dataCompra = $this->compra($rucEntidad, $rucContratista, $compra);
                $dataContrato = $this->contrato($rucEntidad, $rucContratista, $contrato);
                $object1->type = $type;
                $object1->dataCompra = $dataCompra;
                $object1->dataContrato = $dataContrato;
                break;

            case 'PRC':
                $compra = 'adi_osce_ordencompra';
                $contrato = 'prc_osce_contrato';
                $orden = 'Proveedor recién creado';
                $type = 1;
                $dataCompra = $this->compra($rucEntidad, $rucContratista, $compra);
                $dataContrato = $this->contrato($rucEntidad, $rucContratista, $contrato);
                $object1->type = $type;
                $object1->dataCompra = $dataCompra;
                $object1->dataContrato = $dataContrato;
                break;
            case 'CRC':
                $contrato = 'crc_osce_contrato';
                $title = 'Consorcio con proveedores recién creados';
                $type = 4;
                $dataContrato = $this->contrato($rucEntidad, $rucContratista, $contrato);
                $object1->type = $type;
                $object1->dataContrato = $dataContrato;
                break;
            case 'ADI':
                $compra = 'adi_osce_ordencompra';
                $title = 'Adjudicaciones directas';
                $type = 3;
                $dataCompra = $this->compra($rucEntidad, $rucContratista, $compra);
                $object1->type = $type;
                $object1->dataCompra = $dataCompra;
                break;
            case 'PMR':
                $contrato = 'pmr_osce_contrato';
                $title = 'Proveedor con mismo representante';
                $type = 4;
                $dataContrato = $this->contrato($rucEntidad, $rucContratista, $contrato);
                $object1->type = $type;
                $object1->dataContrato = $dataContrato;
                break;
            case 'PCP':
                $compra = '';
                $contrato = '';
                $title = 'Personas con prohibición de contratar';
                $type = 0;
                $object1->type = $type;

                break;
            case 'CPP':
                $compra = '';
                $contrato = '';
                $title = 'CPP';
                $type = 0;
                $object1->type = $type;
                break;
            case 'COF':
                $compra = '';
                $contrato = '';
                $title = 'Consorcios fantasma';
                $type = 0;
                $object1->type = $type;
                break;
        }

        return view('detail2', compact('title', 'object1', 'contratista', 'entidad'));
    }

    public function compra($rucEntidad, $rucContratista, $compra)
    {




        $dataCompra = DB::select("SELECT periodo, entidad, ruc_entidad, fecha_registro, fecha_emision, fecha_compromiso_presupuestal, fecha_de_notificacion, tipoorden, 
                                  nro_de_orden, orden, descripcion_orden, moneda, monto_total_original, objetocontractual, estadocontratacion, tipocontratacion, 
                                  departamento, ruc_contratista, nombre_razon_contratista
	                              FROM public.$compra
                                  where ruc_entidad=? and ruc_contratista=? order by fecha_emision", [$rucEntidad, $rucContratista]);
        return  $dataCompra;
    }
    public function contrato($rucEntidad, $rucContratista, $contrato)
    {


        $dataContrato = DB::select("SELECT periodo, codigoconvocatoria, n_cod_contrato, descripcion_proceso, fecha_publicacion_contrato, fecha_suscripcion_contrato, fecha_vigencia_inicial, fecha_vigencia_final, fecha_vigencia_fin_actualizada,
                                           codigo_contrato, num_contrato, monto_contratado_total, monto_contratado_item, monto_adicional, monto_reduccion, monto_prorroga, monto_complementario, urlcontrato, codigoentidad, num_item, moneda, ruc_contratista, ruc_destinatario_pago, tieneresolucion, ruc_entidad, nombre_contratista, nombre_entidad
	                                       FROM public.$contrato
                                           where ruc_entidad=? and ruc_contratista=? order by fecha_suscripcion_contrato", [$rucEntidad, $rucContratista]);
        return  $dataContrato;
    }
    public function convertData($data)
    {
        $newArray = [];
        $orderData = 0;

        foreach ($data as $item) {
            $presumaRiesgo = $item->montoFRA + $item->montoADI + $item->montoPRC + $item->montoCRC + $item->montoPMR;
            $newCategory = [];
            $object1 = new stdClass();
            $orderData = $orderData + 1;
            $object1->order = $orderData;
            $object1->ruc = $item->ruc_entidad;
            $object1->nombre = $item->nombre_entidad;
            $object1->riesgo = number_format(round(floatval($presumaRiesgo), 2), 2);
            $object1->nota = round(floatval($item->IndiceTCO), 2);
            //---Fraccionamientos---//
            $fraccionamiento = new stdClass();
            $fraccionamiento->name = "Fraccionamiento";
            $fraccionamiento->riesgo =  number_format(round(floatval($item->montoFRA), 2), 2);
            $fraccionamiento->nota = round(floatval($item->IndiceFRA), 2);
            $fraccionamiento->sigla = "FRA";
            array_push($newCategory, $fraccionamiento);
            //---Proveedor recién creado---/
            $proveedorRecienCreado = new stdClass();
            $proveedorRecienCreado->name = "Proveedor recién creado";
            $proveedorRecienCreado->riesgo = number_format(round(floatval($item->montoPRC), 2), 2);
            $proveedorRecienCreado->nota = round(floatval($item->IndicePRC), 2);
            $proveedorRecienCreado->sigla = "PRC";
            array_push($newCategory, $proveedorRecienCreado);
            //---Proveedor con mismo representante---/
            $proveedorMismoRepresentante = new stdClass();
            $proveedorMismoRepresentante->name = "Proveedor con mismo representante";
            $proveedorMismoRepresentante->riesgo = number_format(round(floatval($item->montoPMR), 2), 2);
            $proveedorMismoRepresentante->nota = round(floatval($item->IndicePMR), 2);
            $proveedorMismoRepresentante->sigla = "PMR";
            array_push($newCategory, $proveedorMismoRepresentante);
            //---Consorcio con proveedores recién creados---/
            $consorcioProveedoresRecienCreados = new stdClass();
            $consorcioProveedoresRecienCreados->name = "Consorcio con proveedores recién creados";
            $consorcioProveedoresRecienCreados->riesgo =  number_format(round(floatval($item->montoCRC), 2), 2);
            $consorcioProveedoresRecienCreados->nota = round(floatval($item->IndiceCRC), 2);
            $consorcioProveedoresRecienCreados->sigla = "CRC";
            array_push($newCategory, $consorcioProveedoresRecienCreados);
            //---Adjudicaciones directas---/
            $adjudicacionesDirectas = new stdClass();
            $adjudicacionesDirectas->name = "Adjudicaciones directas";
            $adjudicacionesDirectas->riesgo = number_format(round(floatval($item->montoADI), 2), 2);
            $adjudicacionesDirectas->nota =  round(floatval($item->IndiceADI), 2);
            $adjudicacionesDirectas->sigla = "ADI";
            array_push($newCategory, $adjudicacionesDirectas);
            //---Personas con prohibición de contratar---/
            $personasProhibicionContratar = new stdClass();
            $personasProhibicionContratar->name = "Personas con prohibición de contratar";
            $personasProhibicionContratar->riesgo =  number_format(round(floatval($item->montoPCP), 2), 2);
            $personasProhibicionContratar->nota =  round(floatval($item->IndicePCP), 2);
            $personasProhibicionContratar->sigla = "PCP";
            array_push($newCategory, $personasProhibicionContratar);
            //---CPP---/
            // $cpp = new stdClass();
            // $cpp->name = "CPP";
            // $cpp->riesgo = round(floatval($item->montoCPP), 2);
            // $cpp->nota = round(floatval($item->IndiceCPP), 2);
            // $cpp->sigla = "CPP";
            // array_push($newCategory, $cpp);
            //---Consorcios fantasma---/
            $consorciosFantasma = new stdClass();
            $consorciosFantasma->name = "Consorcios fantasma";
            $consorciosFantasma->riesgo = number_format(round(floatval($item->montoCOF), 2), 2);
            $consorciosFantasma->nota = round(floatval($item->IndiceCOF), 2);
            $consorciosFantasma->sigla = "COF";
            array_push($newCategory, $consorciosFantasma);


            $object1->category = $newCategory;
            array_push($newArray, $object1);
        }

        return $newArray;
    }
}
