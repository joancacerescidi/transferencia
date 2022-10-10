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
                                      where "totalperiodoentidad"."nombre_entidad" like ?', ['%' . strtoupper($palabra) . '%']);
        $result = $this->convertData($dataSearch);

        return view('search', compact('result', 'palabra'));
    }
    public function detalle1($ruc)
    {
        $dataDetalle1 = DB::select("SELECT periodo, ruc_entidad, nombre_entidad, ruc_contratista, nombre_contratista, monto, cantidad FROM public.adi_proveedor_ordencompra where ruc_entidad=?", [$ruc]);
        return view('detail', compact('dataDetalle1'));
    }
    public function detalle2($ruc)
    {
        $dataDetalle2 = DB::select("SELECT periodo, ruc_entidad, nombre_entidad, ruc_contratista, nombre_contratista, monto, cantidad FROM public.adi_proveedor_ordencompra where ruc_entidad=?", [$ruc]);
        return view('detail2', compact('dataDetalle2'));
    }
    public function convertData($data)
    {
        $newArray = [];
        $orderData = 0;
        foreach ($data as $item) {
            $newCategory = [];
            $object1 = new stdClass();
            $orderData = $orderData + 1;
            $object1->order = $orderData;
            $object1->ruc = $item->ruc_entidad;
            $object1->nombre = $item->nombre_entidad;
            $object1->riesgo = round(floatval($item->montoordencompra), 2);
            $object1->nota = round(floatval($item->montocontrato), 2);
            //---Fraccionamientos---//
            $fraccionamiento = new stdClass();
            $fraccionamiento->name = "Fraccionamiento";
            $fraccionamiento->riesgo =  round(floatval($item->montoFRA), 2);
            $fraccionamiento->nota = round(floatval($item->IndiceFRA), 2);
            array_push($newCategory, $fraccionamiento);
            //---Proveedor recién creado---/
            $proveedorRecienCreado = new stdClass();
            $proveedorRecienCreado->name = "Proveedor recién creado";
            $proveedorRecienCreado->riesgo = round(floatval($item->montoPRC), 2);
            $proveedorRecienCreado->nota = round(floatval($item->IndicePRC), 2);
            array_push($newCategory, $proveedorRecienCreado);
            //---Proveedor con mismo representante---/
            $proveedorMismoRepresentante = new stdClass();
            $proveedorMismoRepresentante->name = "Proveedor con mismo representante";
            $proveedorMismoRepresentante->riesgo = round(floatval($item->montoPMR), 2);
            $proveedorMismoRepresentante->nota = round(floatval($item->IndicePMR), 2);
            array_push($newCategory, $proveedorMismoRepresentante);
            //---Consorcio con proveedores recién creados---/
            $consorcioProveedoresRecienCreados = new stdClass();
            $consorcioProveedoresRecienCreados->name = "Consorcio con proveedores recién creados";
            $consorcioProveedoresRecienCreados->riesgo = round(floatval($item->montoCRC), 2);
            $consorcioProveedoresRecienCreados->nota = round(floatval($item->IndiceCRC), 2);
            array_push($newCategory, $consorcioProveedoresRecienCreados);
            //---Adjudicaciones directas---/
            $adjudicacionesDirectas = new stdClass();
            $adjudicacionesDirectas->name = "Adjudicaciones directas";
            $adjudicacionesDirectas->riesgo = round(floatval($item->montoADI), 2);
            $adjudicacionesDirectas->nota = round(floatval($item->IndiceADI), 2);
            array_push($newCategory, $adjudicacionesDirectas);
            //---Personas con prohibición de contratar---/
            $personasProhibicionContratar = new stdClass();
            $personasProhibicionContratar->name = "Personas con prohibición de contratar";
            $personasProhibicionContratar->riesgo = round(floatval($item->montoPCP), 2);
            $personasProhibicionContratar->nota = round(floatval($item->IndicePCP), 2);
            array_push($newCategory, $personasProhibicionContratar);
            //---CPP---/
            $cpp = new stdClass();
            $cpp->name = "CPP";
            $cpp->riesgo = round(floatval($item->montoCPP), 2);
            $cpp->nota = round(floatval($item->IndiceCPP), 2);
            array_push($newCategory, $cpp);
            //---Consorcios fantasma---/
            $consorciosFantasma = new stdClass();
            $consorciosFantasma->name = "Consorcios fantasma";
            $consorciosFantasma->riesgo = round(floatval($item->montoCOF), 2);
            $consorciosFantasma->nota = round(floatval($item->IndiceCOF), 2);
            array_push($newCategory, $consorciosFantasma);


            $object1->category = $newCategory;
            array_push($newArray, $object1);
        }

        return $newArray;
    }
}
