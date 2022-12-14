<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlosarioContoller extends Controller
{
    //
    public function index()
    {
       
        return view('glosario.index');
    }
}
