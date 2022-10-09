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
        //obtener el periodo

        // $meses = array(1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Setiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre');
        // $mes = date("m") - 1;
        // $periodoMes = array_search($mes, array_keys($meses));
        // $test = array_values($meses[$periodoMes]);

        // dd($test);

        // $periodo = " Hasta setiembre 2022" . $mes;
        // return view('home', compact('meses'));

        // $dataTop = DB::select('SELECT f_top_entidades(?)', ["202209"]);

        // $dataTop = "SELECT f_top_entidades('202209')";
        $dataTop =  DB::select('SELECT f_top_entidades(?)', ["202209"]);
        $result = $this->convertData($dataTop);

        return view('home', compact('result'));
    }

    public function convertData($data)
    {
        $newArray = [];

        $orderData = 0;
        foreach ($data as $item) {
            $newCategory = [];
            $ds = explode(",", $item->f_top_entidades);
            $object1 = new stdClass();
            $orderData = $orderData + 1;
            $object1->order = $orderData;
            $object1->nombre = $ds[1];
            $object1->riesgo = $ds[2];
            $object1->nota = $ds[3];
            //---Fraccionamientos---//
            $fraccionamiento = new stdClass();
            $fraccionamiento->name = "Fraccionamiento";
            $fraccionamiento->riesgo = $ds[4];
            $fraccionamiento->nota = $ds[12];
            array_push($newCategory, $fraccionamiento);
            //---Proveedor recién creado---/
            $proveedorRecienCreado = new stdClass();
            $proveedorRecienCreado->name = "Proveedor recién creado";
            $proveedorRecienCreado->riesgo = $ds[5];
            $proveedorRecienCreado->nota = $ds[13];
            array_push($newCategory, $proveedorRecienCreado);
            //---Proveedor con mismo representante---/
            $proveedorMismoRepresentante = new stdClass();
            $proveedorMismoRepresentante->name = "Proveedor con mismo representante";
            $proveedorMismoRepresentante->riesgo = $ds[6];
            $proveedorMismoRepresentante->nota = $ds[14];
            array_push($newCategory, $proveedorMismoRepresentante);
            //---Consorcio con proveedores recién creados---/
            $consorcioProveedoresRecienCreados = new stdClass();
            $consorcioProveedoresRecienCreados->name = "Consorcio con proveedores recién creados";
            $consorcioProveedoresRecienCreados->riesgo = $ds[7];
            $consorcioProveedoresRecienCreados->nota = $ds[15];
            array_push($newCategory, $consorcioProveedoresRecienCreados);
            //---Adjudicaciones directas---/
            $adjudicacionesDirectas = new stdClass();
            $adjudicacionesDirectas->name = "Adjudicaciones directas";
            $adjudicacionesDirectas->riesgo = $ds[8];
            $adjudicacionesDirectas->nota = $ds[16];
            array_push($newCategory, $adjudicacionesDirectas);
            //---Personas con prohibición de contratar---/
            $personasProhibicionContratar = new stdClass();
            $personasProhibicionContratar->name = "Personas con prohibición de contratar";
            $personasProhibicionContratar->riesgo = $ds[9];
            $personasProhibicionContratar->nota = $ds[17];
            array_push($newCategory, $personasProhibicionContratar);
            //---CPP---/
            $cpp = new stdClass();
            $cpp->name = "CPP";
            $cpp->riesgo = $ds[10];
            $cpp->nota = $ds[18];
            array_push($newCategory, $cpp);
            //---Consorcios fantasma---/
            $consorciosFantasma = new stdClass();
            $consorciosFantasma->name = "Consorcios fantasma";
            $consorciosFantasma->riesgo = $ds[11];
            $consorciosFantasma->nota = $ds[19];
            array_push($newCategory, $consorciosFantasma);


            $object1->category = $newCategory;
            array_push($newArray, $object1);
        }
        // dd($newArray);
        return $newArray;
    }
}
