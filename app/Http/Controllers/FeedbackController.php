<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FeedbackController extends Controller
{
    //
    public function index(){
        return view('feedback.index');
    }
    public function created(Request $request)
    {
        $request->validate([
            'detalle' => 'required|string',
            'telefono' => 'required|numeric',
            'email' => 'required|email',
            'nombre' => 'required|string',
        ]);

        DB::table('feedback')->insert([
            'detalle' => $request->detalle,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'nombre' => $request->nombre,
        ]);

        return back()->with('success', 'Se registró su feedback');
    }
}
