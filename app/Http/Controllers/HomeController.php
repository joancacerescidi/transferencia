<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        
        return view('home');
    }
}
