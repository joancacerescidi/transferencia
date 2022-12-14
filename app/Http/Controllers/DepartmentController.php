<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use stdClass;

class DepartmentController extends Controller
{
    //
    public function index($department, $period)
    {
        $periods = [2018, 2019, 2020, 2021, 2022, 2023];
        $departments = [
            'LAMBAYEQUE', 'PIURA', 'TUMBES', 'APURIMAC', 'AREQUIPA',
            'CUSCO', 'MADRE DE DIOS', 'PUNO', 'MOQUEGUA', 'TACNA',
            'ANCASH', 'CAJAMARCA', 'HUANUCO', 'LA LIBERTAD', 'PASCO',
            'SAN MARTIN', 'UCAYALI', 'AMAZONAS', 'LORETO', 'AYACUCHO',
            'CALLAO', 'HUANCAVELICA', 'ICA', 'JUNIN', 'LIMA'
        ];

        $validator = Validator::make(['period' => $period, 'department' => $department], [
            'period' => ['required', 'integer', Rule::in($periods)],
            'department' => ['required', 'string', Rule::in($departments)]
        ]);
        if (!$validator->fails()) {
            $resultDepartmentDetail = $this->deparmentDetail($period, $department);
           
            return view('department.index', compact('resultDepartmentDetail', 'department'));
        } else {
            abort(404);
        }
    }
    public function deparmentDetail($period, $department)
    {
        $data = DB::table('public.totalannoentidad')
                   ->select('ruc_entidad', 'nombre_entidad', 'montoordencompra', 'montocontrato',
                            'cantidadfra', 'montoprc', 'montopmr', 'montocrc', 'montoadi', 'montocof', 
                            'montofra', 'cantidadprc','cantidadpmr', 'cantidadcrc', 'cantidadadi',
                            'cantidadcof', 'departamento', 'nivelgobierno', 'poder',
                            DB::raw('(montofra+montoadi+montoprc+montocrc+montopmr) as ranking'))
                    ->where('anno', $period)
                    ->where('departamento', $department)
                    ->orderBy('ranking', 'DESC')->paginate(15);

        $newArray = [];
        $orderData = 0;
        foreach ($data as $item) {
            $presumaRiesgo = $item->montoFRA + $item->montoADI + $item->montoPRC + $item->montoCRC + $item->montoPMR;
            $newCategory = [];
            $object1 = new stdClass();
            $orderData = $orderData + 1;
            $object1->order = $orderData;
            $object1->ruc = $item->ruc_entidad;
            $object1->nombre = $item->nombre_entidad;
            $object1->riesgo = number_format(round(floatval($presumaRiesgo), 2), 2);
            $object1->nota = round(floatval($item->IndiceTCO), 2);
            //---Fraccionamientos---//
            $fraccionamiento = new stdClass();
            $fraccionamiento->name = "Fraccionamiento";
            $fraccionamiento->riesgo =  number_format(round(floatval($item->montoFRA), 2), 2);
            $fraccionamiento->nota = round(floatval($item->IndiceFRA), 2);
            $fraccionamiento->sigla = "FRA";
            array_push($newCategory, $fraccionamiento);
            //---Proveedor recién creado---/
            $proveedorRecienCreado = new stdClass();
            $proveedorRecienCreado->name = "Proveedor recién creado";
            $proveedorRecienCreado->riesgo = number_format(round(floatval($item->montoPRC), 2), 2);
            $proveedorRecienCreado->nota = round(floatval($item->IndicePRC), 2);
            $proveedorRecienCreado->sigla = "PRC";
            array_push($newCategory, $proveedorRecienCreado);
            //---Proveedor con mismo representante---/
            $proveedorMismoRepresentante = new stdClass();
            $proveedorMismoRepresentante->name = "Proveedor con mismo representante";
            $proveedorMismoRepresentante->riesgo = number_format(round(floatval($item->montoPMR), 2), 2);
            $proveedorMismoRepresentante->nota = round(floatval($item->IndicePMR), 2);
            $proveedorMismoRepresentante->sigla = "PMR";
            array_push($newCategory, $proveedorMismoRepresentante);
            //---Consorcio con proveedores recién creados---/
            $consorcioProveedoresRecienCreados = new stdClass();
            $consorcioProveedoresRecienCreados->name = "Consorcio con proveedores recién creados";
            $consorcioProveedoresRecienCreados->riesgo =  number_format(round(floatval($item->montoCRC), 2), 2);
            $consorcioProveedoresRecienCreados->nota = round(floatval($item->IndiceCRC), 2);
            $consorcioProveedoresRecienCreados->sigla = "CRC";
            array_push($newCategory, $consorcioProveedoresRecienCreados);
            //---Adjudicaciones directas---/
            $adjudicacionesDirectas = new stdClass();
            $adjudicacionesDirectas->name = "Adjudicaciones directas";
            $adjudicacionesDirectas->riesgo = number_format(round(floatval($item->montoADI), 2), 2);
            $adjudicacionesDirectas->nota =  round(floatval($item->IndiceADI), 2);
            $adjudicacionesDirectas->sigla = "ADI";
            array_push($newCategory, $adjudicacionesDirectas);
            //---Personas con prohibición de contratar---/
            $personasProhibicionContratar = new stdClass();
            $personasProhibicionContratar->name = "Personas con prohibición de contratar";
            $personasProhibicionContratar->riesgo =  number_format(round(floatval($item->montoPCP), 2), 2);
            $personasProhibicionContratar->nota =  round(floatval($item->IndicePCP), 2);
            $personasProhibicionContratar->sigla = "PCP";
            array_push($newCategory, $personasProhibicionContratar);
            //---CPP---/
            // $cpp = new stdClass();
            // $cpp->name = "CPP";
            // $cpp->riesgo = round(floatval($item->montoCPP), 2);
            // $cpp->nota = round(floatval($item->IndiceCPP), 2);
            // $cpp->sigla = "CPP";
            // array_push($newCategory, $cpp);
            //---Consorcios fantasma---/
            $consorciosFantasma = new stdClass();
            $consorciosFantasma->name = "Consorcios fantasma";
            $consorciosFantasma->riesgo = number_format(round(floatval($item->montoCOF), 2), 2);
            $consorciosFantasma->nota = round(floatval($item->IndiceCOF), 2);
            $consorciosFantasma->sigla = "COF";
            array_push($newCategory, $consorciosFantasma);


            $object1->category = $newCategory;
            array_push($newArray, $object1);
        }                  
        return $newArray;
    }
}
