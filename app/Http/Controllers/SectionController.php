<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{

    //controlador que devuelve por defecto los datos con el periodo 2018
    public function index($period = 2018)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $validator = Validator::make(['period' => $period], [
            'period' => ['required', 'integer', Rule::in($periods)]
        ]);
        if (!$validator->fails()) {
            $resultDeparment = $this->dataDepartment($period);
        
            return view('section.index', compact('periods', 'period', 'resultDeparment'));
        } else {
            abort(404);
        }
    }
    //Mapa-1
    public function dataDepartment($period)
    {

        $data = DB::select("SELECT departamento, sum(montoordencompra) as montoordencompra, sum(montocontrato) as montocontrato, 
                                                 sum(cantidadfra) as cantidadfra, sum(montoprc) as montoprc, sum(montopmr) as montopmr, 
                                                 sum(montocrc) as montocrc, sum(montoadi) as montoadi, sum(montocof) as montocof, 
                                                 sum(montofra) as montofra, sum(cantidadprc) as cantidadprc, sum(cantidadpmr) as cantidadpmr,
                                                 sum(cantidadcrc) as cantidadcrc, sum(cantidadadi) as cantidadadi
                            FROM public.totalannoentidad
                            WHERE anno=? AND departamento IS NOT NULL
                            GROUP BY departamento", [$period]);
        return $data;
    }
    //Sección del gráfico de barras
    public function governmentLevel()
    {
        return "hola";
    }

    //Sección del mapa del perú
    public function detailRegion($department, $period, $order)
    {
        if (($order == 'indice' || $order == 'monto') && is_string($department) && is_string($period)) {
            $typeOrder = "";
            if ($order == 'indice') {
                $typeOrder = "IndiceTCO";
            } else if ($order == 'monto') {
                $typeOrder = "montototal";
            }
            $result = DB::table('totalperiodoentidad')->select(
                'ruc_entidad',
                'nombre_entidad',
                DB::raw(
                    '(montoordencompra + montocontrato) as montototal'
                ),
                'montoFRA',
                'montoPRC',
                'montoPMR',
                'montoCRC',
                'montoADI',
                'montoPCP',
                'montoCPP',
                'montoCOF',
                'IndiceFRA',
                'IndicePRC',
                'IndicePMR',
                'IndiceCRC',
                'IndiceADI',
                'IndicePCP',
                'IndiceCPP',
                'IndiceCOF',
                'IndiceTCO',
                'IndiceTEJ',
                'montotco',
                'montotej'
            )->where('periodo', $period)->where('departamento', $department)->orderBy($typeOrder)->paginate(15);
            dd($result);
        } else {
            return redirect('/');
        }
    }
}
