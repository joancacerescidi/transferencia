<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class RankingSearchController extends Controller
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
        $result = $this->convertDataEntidad($data);

        return view('ranking.entidad', compact('result'));
    }
    public function searchEntidad(Request $request, $period)
    {

        $request->validate([
            'palabraClave' => 'required|string',
        ]);
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
            )->where('ruc_entidad', strtoupper($request->palabraClave))
            ->orWhere('nombre_entidad', 'LIKE', '%' . strtoupper($request->palabraClave) . '%')
            ->where('anno', $period)->orderBy('ranking', 'DESC')->paginate(10);

        $result = $this->convertDataEntidad($data);
        $search = true;
        return view('ranking.entidad', compact('result', 'search', 'period'));
    }
    public function rankingProveedor($period)
    {
        $data = DB::table('public.proveedor_anno')
            ->select(
                'ruc_proveedor',
                'nombre',
                'anno',
                'cantidadoc',
                'montooc',
                'cantidadcontrato',
                'montocontrato',
                'cantidadconsorcio',
                'montoconsorcio',
                'cantidadpostor',
                'cantidadpmr',
                'cantidadresuelto',
                'montoresuelto',
                'cantidadsanciones',
                'cantidadpenalidad',
                'montopenalidad',
                DB::raw('(cantidadoc + cantidadcontrato + cantidadconsorcio) as ranking')
            )
            ->where('anno', $period)
            ->orderBy('ranking', 'DESC')->paginate(10);

        $result = $this->convertDataProveedor($data);

        return view('ranking.proveedor', compact('result'));
    }
    public function searchProveedor(Request $request, $period)
    {
        $request->validate([
            'palabraClave' => 'required|string',
        ]);
        $data = DB::table('public.proveedor_anno')
            ->select(
                'ruc_proveedor',
                'nombre',
                'anno',
                'cantidadoc',
                'montooc',
                'cantidadcontrato',
                'montocontrato',
                'cantidadconsorcio',
                'montoconsorcio',
                'cantidadpostor',
                'cantidadpmr',
                'cantidadresuelto',
                'montoresuelto',
                'cantidadsanciones',
                'cantidadpenalidad',
                'montopenalidad',
                DB::raw('(cantidadoc + cantidadcontrato + cantidadconsorcio) as ranking')
            )
            ->where('anno', $period)
            ->where('ruc_proveedor', strtoupper($request->palabraClave))
            ->orWhere('nombre', 'LIKE', '%' . strtoupper($request->palabraClave) . '%')
            ->orderBy('ranking', 'DESC')->paginate(10);

        $result = $this->convertDataProveedor($data);
        $search = true;
        return view('ranking.proveedor', compact('result', 'search', 'period'));
    }
    public function rankingFuncionario($period)
    {
        $data = DB::table('public.funcionario_anno')
            ->select(
                'anno',
                'idfuncionario',
                'nombre',
                'cantidad_ordencompra',
                'cantidad_contrato',
                'cantidad_consorcio',
                'monto_ordencompra',
                'monto_contrato',
                'monto_consorcio',
                'cantidade_ordencompra',
                'montoe_ordencompra',
                'cantidade_contrato',
                'montoe_contrato',
                'cantidade_consorcio',
                'montoe_consorcio',
                'cantidada_ordencompra',
                'montoa_ordencompra',
                'cantidada_contrato',
                'montoa_contrato',
                'cantidada_consorcio',
                'montoa_consorcio',
                'cantidadd_ordencompra',
                'montod_ordencompra',
                'cantidadd_contrato',
                'montod_contrato',
                'cantidadd_consorcio',
                'montod_consorcio',
                DB::raw('(cantidad_ordencompra+cantidad_contrato+cantidad_consorcio+cantidade_ordencompra+cantidade_contrato+cantidade_consorcio+cantidada_ordencompra+cantidada_contrato+cantidada_consorcio) as ranking')
            )
            ->where('anno', $period)
            ->orderBy('ranking', 'DESC')->paginate(10);
        $result = $this->convertDataFuncionario($data);
        return view('ranking.funcionario', compact('result'));
    }
    public function searchFuncionario(Request $request,$period)
    {
        $request->validate([
            'palabraClave' => 'required|string',
        ]);
        $data = DB::table('public.funcionario_anno')
        ->select(
            'anno',
            'idfuncionario',
            'nombre',
            'cantidad_ordencompra',
            'cantidad_contrato',
            'cantidad_consorcio',
            'monto_ordencompra',
            'monto_contrato',
            'monto_consorcio',
            'cantidade_ordencompra',
            'montoe_ordencompra',
            'cantidade_contrato',
            'montoe_contrato',
            'cantidade_consorcio',
            'montoe_consorcio',
            'cantidada_ordencompra',
            'montoa_ordencompra',
            'cantidada_contrato',
            'montoa_contrato',
            'cantidada_consorcio',
            'montoa_consorcio',
            'cantidadd_ordencompra',
            'montod_ordencompra',
            'cantidadd_contrato',
            'montod_contrato',
            'cantidadd_consorcio',
            'montod_consorcio',
            DB::raw('(cantidad_ordencompra+cantidad_contrato+cantidad_consorcio+cantidade_ordencompra+cantidade_contrato+cantidade_consorcio+cantidada_ordencompra+cantidada_contrato+cantidada_consorcio) as ranking')
        )
         ->where('nombre', 'LIKE', '%' . strtoupper($request->palabraClave) . '%')
        ->orderBy('ranking', 'DESC')->paginate(10);

        $result = $this->convertDataFuncionario($data);
        $search = true;
        return view('ranking.funcionario', compact('result','search', 'period'));
    }
    public function convertDataEntidad($data)
    {

        $data->each(function ($item) {
            $item->dataList = new stdClass();
            $item->dataList->nombre = $item->nombre_entidad;
            $item->dataList->montoTotal = $item->montoordencompra + $item->montocontrato;
            $item->dataList->ranking = round($item->ranking / ($item->montoordencompra + $item->montocontrato), 2);
            $item->dataList->categorys = [];
            //---Fraccionamientos---//
            $fraccionamiento = new stdClass();
            $fraccionamiento->name = "Fraccionamiento";
            $fraccionamiento->monto =  $item->montofra;
            $fraccionamiento->cantidad = $item->cantidadfra;
            $fraccionamiento->sigla = "FRA";
            array_push($item->dataList->categorys, $fraccionamiento);
            //---Proveedor recién creado---/
            $proveedorRecienCreado = new stdClass();
            $proveedorRecienCreado->name = "Proveedor recién creado";
            $proveedorRecienCreado->monto = $item->montoprc;
            $proveedorRecienCreado->cantidad = $item->cantidadprc;
            $proveedorRecienCreado->sigla = "PRC";
            array_push($item->dataList->categorys, $proveedorRecienCreado);
            //---Proveedor con mismo representante---/
            $proveedorMismoRepresentante = new stdClass();
            $proveedorMismoRepresentante->name = "Proveedor con mismo representante";
            $proveedorMismoRepresentante->monto = $item->montopmr;
            $proveedorMismoRepresentante->cantidad = $item->cantidadpmr;
            $proveedorMismoRepresentante->sigla = "PMR";
            array_push($item->dataList->categorys, $proveedorMismoRepresentante);
            //---Consorcio con proveedores recién creados---/
            $consorcioProveedoresRecienCreados = new stdClass();
            $consorcioProveedoresRecienCreados->name = "Consorcio con proveedores recién creados";
            $consorcioProveedoresRecienCreados->monto =  $item->montocrc;
            $consorcioProveedoresRecienCreados->cantidad = $item->cantidadcrc;
            $consorcioProveedoresRecienCreados->sigla = "CRC";
            array_push($item->dataList->categorys, $consorcioProveedoresRecienCreados);
            //---Adjudicaciones directas---/
            $adjudicacionesDirectas = new stdClass();
            $adjudicacionesDirectas->name = "Adjudicaciones directas";
            $adjudicacionesDirectas->monto = $item->montoadi;
            $adjudicacionesDirectas->cantidad = $item->cantidadadi;
            $adjudicacionesDirectas->sigla = "ADI";
            array_push($item->dataList->categorys, $adjudicacionesDirectas);
            //---Consorcios fantasma---/
            $consorciosFantasma = new stdClass();
            $consorciosFantasma->name = "Consorcios fantasma";
            $consorciosFantasma->monto = $item->montocof;
            $consorciosFantasma->cantidad = $item->cantidadcof;
            $consorciosFantasma->sigla = "COF";
            array_push($item->dataList->categorys, $consorciosFantasma);
        });

        return $data;
    }
    public function convertDataProveedor($data)
    {

        $data->each(function ($item) {
            $item->dataList = new stdClass();
            $item->dataList->nombre = $item->nombre;
            $item->dataList->montoTotal = 0;
            $item->dataList->ranking = 0;
            $item->dataList->categorys = [];


            $montooc = new stdClass();
            $montooc->name = "montooc";
            $montooc->monto =  $item->montooc ?? 0;
            $montooc->cantidad = $item->cantidadoc ?? 0;
            $montooc->sigla = "montooc";
            array_push($item->dataList->categorys, $montooc);

            $montocontrato = new stdClass();
            $montocontrato->name = "montocontrato";
            $montocontrato->monto =  $item->montocontrato ?? 0;
            $montocontrato->cantidad = $item->cantidadcontrato ?? 0;
            $montocontrato->sigla = "montocontrato";
            array_push($item->dataList->categorys, $montocontrato);

            $montoconsorcio = new stdClass();
            $montoconsorcio->name = "montoconsorcio";
            $montoconsorcio->monto =  $item->montoconsorcio ?? 0;
            $montoconsorcio->cantidad = $item->cantidadconsorcio ?? 0;
            $montoconsorcio->sigla = "montocontrato";
            array_push($item->dataList->categorys, $montoconsorcio);

            $montoresuelto = new stdClass();
            $montoresuelto->name = "montoresuelto";
            $montoresuelto->monto =  $item->montoresuelto ?? 0;
            $montoresuelto->cantidad = $item->cantidadresuelto ?? 0;
            $montoresuelto->sigla = "montocontrato";
            array_push($item->dataList->categorys, $montoresuelto);

            $montopenalidad = new stdClass();
            $montopenalidad->name = "montoresuelto";
            $montopenalidad->monto =  $item->montopenalidad ?? 0;
            $montopenalidad->cantidad = $item->cantidadpenalidad ?? 0;
            $montopenalidad->sigla = "montocontrato";
            array_push($item->dataList->categorys, $montopenalidad);
        });

        return $data;
    }
    public function convertDataFuncionario($data)
    {

        $data->each(function ($item) {
            $item->dataList = new stdClass();
            $item->dataList->nombre = $item->nombre;
            $item->dataList->montoTotal = $item->monto_ordencompra + $item->monto_contrato + $item->monto_consorcio +
                $item->montoe_ordencompra + $item->montoe_contrato + $item->montoe_consorcio +
                $item->montoa_ordencompra + $item->montoa_contrato + $item->montoa_consorcio +
                $item->montod_ordencompra + $item->montod_contrato + $item->montod_consorcio;
            $item->dataList->ranking = 0;
            $item->dataList->categorys = [];


            $monto_ordencompra = new stdClass();
            $monto_ordencompra->name = "monto_ordencompra";
            $monto_ordencompra->monto =  $item->monto_ordencompra ?? 0;
            $monto_ordencompra->cantidad = $item->cantidad_ordencompra ?? 0;
            $monto_ordencompra->sigla = "monto_ordencompra";
            array_push($item->dataList->categorys, $monto_ordencompra);

            $monto_contrato = new stdClass();
            $monto_contrato->name = "monto_contrato";
            $monto_contrato->monto =  $item->monto_contrato ?? 0;
            $monto_contrato->cantidad = $item->cantidad_contrato ?? 0;
            $monto_contrato->sigla = "monto_contrato";
            array_push($item->dataList->categorys, $monto_contrato);

            $monto_consorcio = new stdClass();
            $monto_consorcio->name = "monto_consorcio";
            $monto_consorcio->monto =  $item->monto_consorcio ?? 0;
            $monto_consorcio->cantidad = $item->cantidad_consorcio ?? 0;
            $monto_consorcio->sigla = "monto_consorcio";
            array_push($item->dataList->categorys, $monto_consorcio);

            $montoe_ordencompra = new stdClass();
            $montoe_ordencompra->name = "montoe_ordencompra";
            $montoe_ordencompra->monto =  $item->montoe_ordencompra ?? 0;
            $montoe_ordencompra->cantidad = $item->cantidade_ordencompra ?? 0;
            $montoe_ordencompra->sigla = "montoe_ordencompra";
            array_push($item->dataList->categorys, $montoe_ordencompra);

            $montoe_contrato = new stdClass();
            $montoe_contrato->name = "montoe_contrato";
            $montoe_contrato->monto =  $item->montoe_contrato ?? 0;
            $montoe_contrato->cantidad = $item->cantidade_contrato ?? 0;
            $montoe_contrato->sigla = "montoe_contrato";
            array_push($item->dataList->categorys, $montoe_contrato);

            $montoe_consorcio = new stdClass();
            $montoe_consorcio->name = "montoe_consorcio";
            $montoe_consorcio->monto =  $item->montoe_consorcio ?? 0;
            $montoe_consorcio->cantidad = $item->cantidade_consorcio ?? 0;
            $montoe_consorcio->sigla = "montoe_consorcio";
            array_push($item->dataList->categorys, $montoe_consorcio);

            $montoa_ordencompra = new stdClass();
            $montoa_ordencompra->name = "montoa_ordencompra";
            $montoa_ordencompra->monto =  $item->montoa_ordencompra ?? 0;
            $montoa_ordencompra->cantidad = $item->cantidada_ordencompra ?? 0;
            $montoa_ordencompra->sigla = "montoa_ordencompra";
            array_push($item->dataList->categorys, $montoa_ordencompra);

            $montoa_contrato = new stdClass();
            $montoa_contrato->name = "montoa_contrato";
            $montoa_contrato->monto =  $item->montoa_contrato ?? 0;
            $montoa_contrato->cantidad = $item->cantidada_contrato ?? 0;
            $montoa_contrato->sigla = "montoa_contrato";
            array_push($item->dataList->categorys, $montoa_contrato);

            $montoa_consorcio = new stdClass();
            $montoa_consorcio->name = "montoa_consorcio";
            $montoa_consorcio->monto =  $item->montoa_consorcio ?? 0;
            $montoa_consorcio->cantidad = $item->cantidada_consorcio ?? 0;
            $montoa_consorcio->sigla = "montoa_consorcio";
            array_push($item->dataList->categorys, $montoa_consorcio);

            $montod_ordencompra = new stdClass();
            $montod_ordencompra->name = "montod_ordencompra";
            $montod_ordencompra->monto =  $item->montod_ordencompra ?? 0;
            $montod_ordencompra->cantidad = $item->cantidadd_ordencompra ?? 0;
            $montod_ordencompra->sigla = "montod_ordencompra";
            array_push($item->dataList->categorys, $montod_ordencompra);

            $montod_contrato = new stdClass();
            $montod_contrato->name = "montod_contrato";
            $montod_contrato->monto =  $item->montod_contrato ?? 0;
            $montod_contrato->cantidad = $item->cantidadd_contrato ?? 0;
            $montod_contrato->sigla = "montod_contrato";
            array_push($item->dataList->categorys, $montod_contrato);

            $montod_consorcio = new stdClass();
            $montod_consorcio->name = "montod_consorcio";
            $montod_consorcio->monto =  $item->montod_consorcio ?? 0;
            $montod_consorcio->cantidad = $item->cantidadd_consorcio ?? 0;
            $montod_consorcio->sigla = "montod_consorcio";
            array_push($item->dataList->categorys, $montod_consorcio);
        });

        return $data;
    }
}
