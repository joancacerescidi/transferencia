<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use stdClass;

class GovernmentLevelController extends Controller
{
    //
    public function index($nivel, $period)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $validator = Validator::make(['period' => $period, 'nivel' => $nivel], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'nivel' => ['required', 'string', 'max:1']
        ]);
        if (!$validator->fails()) {

            $result = $this->dataGovernment($nivel, $period);
            $ruta = 'entidad.goverment';
            return view('gobermentLevel.index', compact('nivel', 'period', 'result', 'nivel', 'ruta'));
        } else {
            abort(404);
        }
    }
    public function dataGovernment($nivel, $period)
    {
        $data = DB::table('public.totalannoentidad')
            ->select('ruc_entidad', 'nombre_entidad', 'montoordencompra', 'montocontrato', 'cantidadfra', 'montoprc', 'montopmr', 'montocrc', 'montoadi', 'montocof', 'montofra', 'cantidadprc', 'cantidadpmr', 'cantidadcrc', 'cantidadadi', 'cantidadcof', 'departamento', 'nivelgobierno', 'poder', DB::raw('montofra + montoadi + montoprc + montocrc + montopmr as ranking'))
            ->where('anno', '=', $period)
            ->where('nivelgobierno', '=', $nivel)
            ->orderByRaw('ranking DESC')
            ->paginate(10);

        $data->each(function ($item) {
            $item->dataList = new stdClass();
            $item->dataList->rucEntidad = $item->ruc_entidad;
            $item->dataList->nombre = $item->nombre_entidad;
            $item->dataList->montoTotal = number_format(intval($item->montoordencompra + $item->montocontrato));
            $item->dataList->ranking = number_format(intval($item->ranking / ($item->montoordencompra + $item->montocontrato)));
            $item->dataList->categorys = [];
            //---Fraccionamientos---//
            $fraccionamiento = new stdClass();
            $fraccionamiento->name = "Fraccionamiento";
            $fraccionamiento->monto =  number_format(intval($item->montofra));
            $fraccionamiento->cantidad = number_format(intval($item->cantidadfra));
            $fraccionamiento->sigla = "FRA";
            array_push($item->dataList->categorys, $fraccionamiento);

            //---Proveedor recién creado---/
            $proveedorRecienCreado = new stdClass();
            $proveedorRecienCreado->name = "Proveedor recién creado";
            $proveedorRecienCreado->monto = number_format(intval($item->montoprc));
            $proveedorRecienCreado->cantidad = number_format(intval($item->cantidadprc));
            $proveedorRecienCreado->sigla = "PRC";
            array_push($item->dataList->categorys, $proveedorRecienCreado);


            //---Proveedor con mismo representante---/
            $proveedorMismoRepresentante = new stdClass();
            $proveedorMismoRepresentante->name = "Proveedor con mismo representante";
            $proveedorMismoRepresentante->monto = number_format(intval($item->montopmr));
            $proveedorMismoRepresentante->cantidad = number_format(intval($item->cantidadpmr));
            $proveedorMismoRepresentante->sigla = "PMR";
            array_push($item->dataList->categorys, $proveedorMismoRepresentante);

            //---Consorcio con proveedores recién creados---/
            $consorcioProveedoresRecienCreados = new stdClass();
            $consorcioProveedoresRecienCreados->name = "Consorcio con proveedores recién creados";
            $consorcioProveedoresRecienCreados->monto =  number_format(intval($item->montocrc));
            $consorcioProveedoresRecienCreados->cantidad = number_format(intval($item->cantidadcrc));
            $consorcioProveedoresRecienCreados->sigla = "CRC";
            array_push($item->dataList->categorys, $consorcioProveedoresRecienCreados);

            //---Adjudicaciones directas---/
            $adjudicacionesDirectas = new stdClass();
            $adjudicacionesDirectas->name = "Adjudicaciones directas";
            $adjudicacionesDirectas->monto = number_format(intval($item->montoadi));
            $adjudicacionesDirectas->cantidad = number_format(intval($item->cantidadadi));
            $adjudicacionesDirectas->sigla = "ADI";
            array_push($item->dataList->categorys, $adjudicacionesDirectas);

            //---Consorcios fantasma---/
            $consorciosFantasma = new stdClass();
            $consorciosFantasma->name = "Consorcios fantasma";
            $consorciosFantasma->monto = number_format(intval($item->montocof));
            $consorciosFantasma->cantidad = number_format(intval($item->cantidadcof));
            $consorciosFantasma->sigla = "COF";
            array_push($item->dataList->categorys, $consorciosFantasma);
        });

        return $data;
    }
}
