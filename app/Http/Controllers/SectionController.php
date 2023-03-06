<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use stdClass;
use Artesaos\SEOTools\Facades\SEOTools;

class SectionController extends Controller
{

    //controlador que devuelve por defecto los datos con el periodo 2018
    public function index($period = 2022)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $validator = Validator::make(['period' => $period], [
            'period' => ['required', 'integer', Rule::in($periods)]
        ]);
        if (!$validator->fails()) {
            $resultDeparment = $this->dataDepartment($period);
            $resultGraf = $this->governmentLevel($period);
            $this->seo();
            return view('section.index', compact('periods', 'period', 'resultDeparment', 'resultGraf'));
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
    public function governmentLevel($period)
    {
        $data = DB::select("SELECT nivelgobierno, sum(montoprc+montopmr+montocrc+montoadi+montocof+montofra) 
	                        FROM public.totalannoentidad
	                        WHERE anno=?
                            GROUP BY nivelgobierno", [$period]);

        $newObjt = new stdClass();
        $newObjt->label = [];
        $newObjt->dataSet1 = [];

        foreach ($data as $graf) {
            if ($graf->nivelgobierno == 'R') {
                $graf->nivelgobierno = "REGIONAL";
            } else if ($graf->nivelgobierno == 'L') {
                $graf->nivelgobierno = "LOCAL";
            } else if ($graf->nivelgobierno == 'A') {
                $graf->nivelgobierno = "AUTÓNOMO";
            } else if ($graf->nivelgobierno == 'N') {
                $graf->nivelgobierno = "NACIONAL";
            }
            array_push($newObjt->label, $graf->nivelgobierno);
            array_push($newObjt->dataSet1, intval($graf->sum));
        }
        return $newObjt;
    }
    public function seo()
    {
        SEOTools::setTitle('Qullqita Qitapay', false);
        SEOTools::setDescription('Es una iniciativa ciudadana que trata datos abiertos del Estado sobre el uso del presupuesto nacional. En esta primera etapa, hemos consolidado sólo datos desde enero 2018 y está actualizado hasta enero 2023.');
        SEOTools::opengraph()->setUrl('https://qqperu.com/');
        SEOTools::setCanonical('https://qqperu.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://qqperu.com/images/iconQuiilquitaQatipay.jpeg');
    }
}
