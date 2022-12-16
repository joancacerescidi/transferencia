<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class RankingController extends Controller
{
    //
    public function rankingEntidad($period)
    {

        $data = DB::table('public.totalannoentidad')
            ->select(
                'anno',
                'ruc_entidad',
                'nombre_entidad',
                'montoordencompra',
                'montocontrato',
                'cantidadfra',
                'montoprc',
                'montopmr',
                'montocrc',
                'montoadi',
                'montocof',
                'montofra',
                'cantidadprc',
                'cantidadpmr',
                'cantidadcrc',
                'cantidadadi',
                'cantidadcof',
                'indicetco',
                'montotco',
                'departamento',
                'provincia',
                'distrito',
                'nivelgobierno',
                'poder',
                DB::raw('(montofra+montoadi+montoprc+montocrc+montopmr) as ranking')
            )
            ->where('anno', $period)
            ->orderBy('ranking', 'DESC')->paginate(10);
        $result = $this->convertData($data);
        return view('ranking.entidad', compact('result', 'data'));
    }
    public function rankingProveedor($period){
         $data = DB::table('public.proveedor_anno')
                    ->select('ruc_proveedor', 'nombre', 'anno', 'cantidadoc', 'montooc', 'cantidadcontrato', 'montocontrato', 'cantidadconsorcio',
                            'montoconsorcio', 'cantidadpostor', 'cantidadpmr', 'cantidadresuelto', 'montoresuelto', 'cantidadsanciones', 
                            'cantidadpenalidad', 'montopenalidad', DB::raw('(cantidadoc + cantidadcontrato + cantidadconsorcio) as ranking')
                            )
                    ->where('anno', $period)
                    ->orderBy('ranking', 'DESC')->paginate(10);
                    dd($data);
    }
    public function rankingFuncionario($period){
         $data = DB::table('public.funcionario_anno')
                     ->select('anno', 'idfuncionario', 'nombre', 'cantidad_ordencompra', 'cantidad_contrato', 'cantidad_consorcio', 
                              'monto_ordencompra', 'monto_contrato', 'monto_consorcio', 'cantidade_ordencompra', 'montoe_ordencompra', 
                              'cantidade_contrato', 'montoe_contrato', 'cantidade_consorcio', 'montoe_consorcio', 'cantidada_ordencompra',
                              'montoa_ordencompra', 'cantidada_contrato', 'montoa_contrato', 'cantidada_consorcio', 'montoa_consorcio', 
                              'cantidadd_ordencompra', 'montod_ordencompra', 'cantidadd_contrato', 'montod_contrato', 
                              'cantidadd_consorcio', 'montod_consorcio',
                               DB::raw('(cantidad_ordencompra+cantidad_contrato+cantidad_consorcio+cantidade_ordencompra+cantidade_contrato+cantidade_consorcio+cantidada_ordencompra+cantidada_contrato+cantidada_consorcio) as ranking') )
            ->where('anno', $period)
            ->orderBy('ranking', 'DESC')->paginate(10);
            dd($data);
    }
    public function convertData($data)
    {
        $newArray = [];
        foreach ($data as $item) {
            $newCategory = [];
            $object1 = new stdClass();
            $object1->nombre = $item->nombre_entidad;
            //---Fraccionamientos---//
            $fraccionamiento = new stdClass();
            $fraccionamiento->name = "Fraccionamiento";
            $fraccionamiento->riesgo =  number_format(round(floatval($item->montofra), 2), 2);
            $fraccionamiento->nota = round(floatval($item->cantidadfra), 2);
            $fraccionamiento->sigla = "FRA";
            array_push($newCategory, $fraccionamiento);
            //---Proveedor recién creado---/
            $proveedorRecienCreado = new stdClass();
            $proveedorRecienCreado->name = "Proveedor recién creado";
            $proveedorRecienCreado->riesgo = number_format(round(floatval($item->montoprc), 2), 2);
            $proveedorRecienCreado->nota = round(floatval($item->cantidadprc), 2);
            $proveedorRecienCreado->sigla = "PRC";
            array_push($newCategory, $proveedorRecienCreado);
            //---Proveedor con mismo representante---/
            $proveedorMismoRepresentante = new stdClass();
            $proveedorMismoRepresentante->name = "Proveedor con mismo representante";
            $proveedorMismoRepresentante->riesgo = number_format(round(floatval($item->montopmr), 2), 2);
            $proveedorMismoRepresentante->nota = round(floatval($item->cantidadpmr), 2);
            $proveedorMismoRepresentante->sigla = "PMR";
            array_push($newCategory, $proveedorMismoRepresentante);
            //---Consorcio con proveedores recién creados---/
            $consorcioProveedoresRecienCreados = new stdClass();
            $consorcioProveedoresRecienCreados->name = "Consorcio con proveedores recién creados";
            $consorcioProveedoresRecienCreados->riesgo =  number_format(round(floatval($item->montocrc), 2), 2);
            $consorcioProveedoresRecienCreados->nota = round(floatval($item->cantidadcrc), 2);
            $consorcioProveedoresRecienCreados->sigla = "CRC";
            array_push($newCategory, $consorcioProveedoresRecienCreados);
            //---Adjudicaciones directas---/
            $adjudicacionesDirectas = new stdClass();
            $adjudicacionesDirectas->name = "Adjudicaciones directas";
            $adjudicacionesDirectas->riesgo = number_format(round(floatval($item->montoadi), 2), 2);
            $adjudicacionesDirectas->nota =  round(floatval($item->cantidadadi), 2);
            $adjudicacionesDirectas->sigla = "ADI";
            array_push($newCategory, $adjudicacionesDirectas);
            //---Consorcios fantasma---/
            $consorciosFantasma = new stdClass();
            $consorciosFantasma->name = "Consorcios fantasma";
            $consorciosFantasma->riesgo = number_format(round(floatval($item->montocof), 2), 2);
            $consorciosFantasma->nota = round(floatval($item->cantidadcof), 2);
            $consorciosFantasma->sigla = "COF";
            array_push($newCategory, $consorciosFantasma);

            $object1->category = $newCategory;
            array_push($newArray, $object1);
        }

        return $newArray;
    }
}
