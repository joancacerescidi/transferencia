<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RankingSearchController extends Controller
{
    //
    public function rankingEntidad($period, $order)
    {

        $orderby = ['monto', 'ranking'];
        $validator = Validator::make(['order' => $order], [
            'order' => ['required', 'string', Rule::in($orderby)],
        ]);
        if (!$validator->fails()) {
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
                    DB::raw('(montofra+montoadi+montoprc+montocrc+montopmr) as ranking'),
                    DB::raw('(montoordencompra+montocontrato) as monto')
                )
                ->where('anno', $period)
                ->orderBy($order, 'DESC')->paginate(10);
            $result = $this->convertDataEntidad($data);
            return view('ranking.entidad', compact('result', 'period', 'order'));
        } else {
            abort(404);
        }
    }
    public function searchEntidad(Request $request, $period, $order)
    {
        $request->validate([
            'palabraClave' => 'required|string',
        ]);
        $orderby = ['monto', 'ranking'];
        $validator = Validator::make(['order' => $order], [
            'order' => ['required', 'string', Rule::in($orderby)],
        ]);
        if (!$validator->fails()) {
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
                    DB::raw('montofra+montoadi+montoprc+montocrc+montopmr as ranking'),
                    DB::raw('(montoordencompra+montocontrato) as monto')
                )
                ->where(function ($query) use ($request) {
                    $query->where('ruc_entidad', '=', strtoupper($request->palabraClave));
                    $query->orWhere('nombre_entidad', 'LIKE', '%' . strtoupper($request->palabraClave) . '%');
                })
                ->where('anno', '=', $period)
                ->orderBy($order, 'DESC')
                ->paginate(10);

            $result = $this->convertDataEntidad($data);
            $search = true;
            $busquedaPalabra = $request->palabraClave;
            return view('ranking.entidad', compact('result', 'search', 'period', 'busquedaPalabra', 'order'));
        } else {
            abort(404);
        }
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

        return view('ranking.proveedor', compact('result', 'period'));
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
        $busquedaPalabra = $request->palabraClave;
        return view('ranking.proveedor', compact('result', 'search', 'period', 'busquedaPalabra'));
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
        return view('ranking.funcionario', compact('result', 'period'));
    }
    public function searchFuncionario(Request $request, $period)
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
        $busquedaPalabra = $request->palabraClave;
        return view('ranking.funcionario', compact('result', 'search', 'period', 'busquedaPalabra'));
    }

    public function convertDataEntidad($data)
    {

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

            $dataEntidadGraf = DB::table('totalannoentidad')
                ->select(
                    'anno',
                    DB::raw('(montofra+montoadi+montoprc+montocrc+montopmr ) as ranking'),
                    DB::raw('(montoordencompra+montocontrato ) as montocompra'),
                )->where('ruc_entidad', $item->ruc_entidad)->orderBy('anno')->get();

            $labels = [];
            $dataset1 = [];
            $dataset2 = [];
            foreach ($dataEntidadGraf as $graf) {
                array_push($labels, $graf->anno);
                array_push($dataset1, intval($graf->ranking));
                array_push($dataset2, intval($graf->montocompra));
            }
            $grafico = new stdClass();
            $grafico->label = $labels;
            $grafico->dataset1 = $dataset1;
            $grafico->dataset2 = $dataset2;

            $item->grafico = $grafico;
        });

        return $data;
    }
    public function convertDataProveedor($data)
    {
        $data->each(function ($item) {
            $item->dataList = new stdClass();
            $item->dataList->contratista = $item->ruc_proveedor;
            $item->dataList->nombre = $item->nombre;
            $item->dataList->montoTotal = number_format(intval($item->montooc + $item->montocontrato + $item->montoconsorcio));
            $item->dataList->cantidadTotal = number_format(intval($item->cantidadoc + $item->cantidadcontrato + $item->cantidadconsorcio));
            $item->dataList->categorys = [];


            $ordenCompra = new stdClass();
            $ordenCompra->name = "Órdenes de compra";
            $ordenCompra->monto =  number_format(intval($item->montooc ?? 0));
            $ordenCompra->cantidad = number_format(intval($item->cantidadoc ?? 0));
            $ordenCompra->sigla = "orden_compra";
            array_push($item->dataList->categorys, $ordenCompra);

            $contrato = new stdClass();
            $contrato->name = "Contrato";
            $contrato->monto =  number_format(intval($item->montocontrato ?? 0));
            $contrato->cantidad = number_format(intval($item->cantidadcontrato ?? 0));
            $contrato->sigla = "contrato";
            array_push($item->dataList->categorys, $contrato);

            $consorcio = new stdClass();
            $consorcio->name = "Como consorcio";
            $consorcio->monto =  number_format(intval($item->montoconsorcio ?? 0));
            $consorcio->cantidad = number_format(intval($item->cantidadconsorcio ?? 0));
            $consorcio->sigla = "consorcio";
            array_push($item->dataList->categorys, $consorcio);

            $contrato_resuelto = new stdClass();
            $contrato_resuelto->name = "Contratos resueltos";
            $contrato_resuelto->monto =  number_format(intval($item->montoresuelto ?? 0));
            $contrato_resuelto->cantidad = number_format(intval($item->cantidadresuelto ?? 0));
            $contrato_resuelto->sigla = "contrato_resuelto";
            array_push($item->dataList->categorys, $contrato_resuelto);

            $postulaciones = new stdClass();
            $postulaciones->name = "Postulaciones";
            $postulaciones->monto = number_format(intval(0));
            $postulaciones->cantidad = number_format(intval($item->cantidadpostor ?? 0));
            $postulaciones->sigla = "postulaciones";
            array_push($item->dataList->categorys, $postulaciones);


            $postulaciones_representante = new stdClass();
            $postulaciones_representante->name = "Postulaciones con mismo representante";
            $postulaciones_representante->monto = number_format(intval(0));
            $postulaciones_representante->cantidad = number_format(intval($item->cantidadpmr ?? 0));
            $postulaciones_representante->sigla = "postulaciones_representante";
            array_push($item->dataList->categorys, $postulaciones_representante);


            $sanciones = new stdClass();
            $sanciones->name = "Sanciones";
            $sanciones->monto = number_format(intval(0));
            $sanciones->cantidad = number_format(intval($item->cantidadsanciones ?? 0));
            $sanciones->sigla = "sanciones";
            array_push($item->dataList->categorys, $sanciones);

            $penalidades = new stdClass();
            $penalidades->name = "Penalidades";
            $penalidades->monto = number_format(intval(0));
            $penalidades->cantidad = number_format(intval(0));
            $penalidades->sigla = "penalidades";
            array_push($item->dataList->categorys, $penalidades);
        });

        return $data;
    }
    public function convertDataFuncionario($data)
    {
        $data->each(function ($item) {

            $item->dataList = new stdClass();
            $item->dataList->idFuncionario = $item->idfuncionario;
            $item->dataList->nombre = $item->nombre;
            $item->dataList->montoTotal = number_format(intval($item->monto_ordencompra + $item->monto_contrato + $item->monto_consorcio +
                $item->montoe_ordencompra + $item->montoe_contrato + $item->montoe_consorcio +
                $item->montoa_ordencompra + $item->montoa_contrato + $item->montoa_consorcio +
                $item->montod_ordencompra + $item->montod_contrato + $item->montod_consorcio));

            $item->dataList->cantidadTotal = number_format(intval($item->cantidad_ordencompra + $item->cantidad_contrato + $item->cantidad_consorcio +
                $item->cantidade_ordencompra + $item->cantidade_contrato + $item->cantidade_consorcio +
                $item->cantidada_ordencompra + $item->cantidada_contrato + $item->cantidada_consorcio +
                $item->cantidadd_ordencompra + $item->cantidadd_contrato + $item->cantidadd_consorcio));
            $item->dataList->categorys = [];

            $DCPD = new stdClass();
            $DCPD->name = "Donde se contrata a un pariente directamente";
            $DCPD->abbreviation = "DCPD";
            $DCPD->subcategory = [];

            $DCPDOrdeneCompra = new stdClass();
            $DCPDOrdeneCompra->name = "Ordenes de compra";
            $DCPDOrdeneCompra->abbreviation = "orden-compra";
            $DCPDOrdeneCompra->monto =  number_format(intval($item->monto_ordencompra ?? 0));
            $DCPDOrdeneCompra->cantidad = number_format(intval($item->cantidad_ordencompra ?? 0));
            array_push($DCPD->subcategory, $DCPDOrdeneCompra);

            $DCPDcontrato = new stdClass();
            $DCPDcontrato->name = "Contrato";
            $DCPDcontrato->abbreviation = "contrato";
            $DCPDcontrato->monto =  number_format(intval($item->monto_contrato ?? 0));
            $DCPDcontrato->cantidad = number_format(intval($item->cantidad_contrato ?? 0));
            array_push($DCPD->subcategory, $DCPDcontrato);

            $DCPDconsorcio = new stdClass();
            $DCPDconsorcio->name = "Como consorcio";
            $DCPDconsorcio->abbreviation = "consorcio";
            $DCPDconsorcio->monto =  number_format(intval($item->monto_consorcio ?? 0));
            $DCPDconsorcio->cantidad = number_format(intval($item->cantidad_consorcio ?? 0));
            array_push($DCPD->subcategory, $DCPDconsorcio);

            array_push($item->dataList->categorys, $DCPD);





            $DPRE = new stdClass();
            $DPRE->name = "Donde un pariente es representante de una empresa";
            $DPRE->abbreviation = "DPRE";
            $DPRE->subcategory = [];

            $DPREOrdeneCompra = new stdClass();
            $DPREOrdeneCompra->name = "Ordenes de compra";
            $DPREOrdeneCompra->abbreviation = "orden-compra";
            $DPREOrdeneCompra->monto =  number_format(intval($item->montoe_ordencompra ?? 0));
            $DPREOrdeneCompra->cantidad = number_format(intval($item->cantidade_ordencompra ?? 0));
            array_push($DPRE->subcategory, $DPREOrdeneCompra);

            $DPREContrato = new stdClass();
            $DPREContrato->name = "Contrato";
            $DPREContrato->abbreviation = "contrato";
            $DPREContrato->monto =  number_format(intval($item->montoe_contrato ?? 0));
            $DPREContrato->cantidad = number_format(intval($item->cantidade_contrato ?? 0));
            array_push($DPRE->subcategory, $DPREContrato);

            $DPREConsorcio = new stdClass();
            $DPREConsorcio->name = "Como consorcio";
            $DPREConsorcio->abbreviation = "consorcio";
            $DPREConsorcio->monto =  number_format(intval($item->montoe_consorcio ?? 0));
            $DPREConsorcio->cantidad = number_format(intval($item->cantidade_consorcio ?? 0));
            array_push($DPRE->subcategory, $DPREConsorcio);

            array_push($item->dataList->categorys, $DPRE);




            $CDAF = new stdClass();
            $CDAF->name = "Contrataciones directas al funcionario";
            $CDAF->abbreviation = "CDAF";
            $CDAF->subcategory = [];

            $CDAFOrdeneCompra = new stdClass();
            $CDAFOrdeneCompra->name = "Ordenes de compra";
            $CDAFOrdeneCompra->abbreviation = "orden-compra";
            $CDAFOrdeneCompra->monto =  number_format(intval($item->montod_ordencompra ?? 0));
            $CDAFOrdeneCompra->cantidad = number_format(intval($item->cantidadd_ordencompra ?? 0));
            array_push($CDAF->subcategory, $CDAFOrdeneCompra);

            $CDAFContrato = new stdClass();
            $CDAFContrato->name = "Contrato";
            $CDAFContrato->abbreviation = "contrato";
            $CDAFContrato->monto =  number_format(intval($item->montod_contrato ?? 0));
            $CDAFContrato->cantidad = number_format(intval($item->cantidadd_contrato ?? 0));
            array_push($CDAF->subcategory, $CDAFContrato);

            $CDAFConsorcio = new stdClass();
            $CDAFConsorcio->name = "Como consorcio";
            $CDAFConsorcio->abbreviation = "consorcio";
            $CDAFConsorcio->monto =  number_format(intval($item->montod_consorcio ?? 0));
            $CDAFConsorcio->cantidad = number_format(intval($item->cantidadd_consorcio ?? 0));
            array_push($CDAF->subcategory, $CDAFConsorcio);

            array_push($item->dataList->categorys, $CDAF);



            $CEDFA = new stdClass();
            $CEDFA->name = "Contrataciones a las empresas donde el funcionario es accionista";
            $CEDFA->abbreviation = "CEDFA";
            $CEDFA->subcategory = [];

            $CEDFAOrdeneCompra = new stdClass();
            $CEDFAOrdeneCompra->name = "Ordenes de compra";
            $CEDFAOrdeneCompra->abbreviation = "orden-compra";
            $CEDFAOrdeneCompra->monto =  number_format(intval($item->montoa_ordencompra ?? 0));
            $CEDFAOrdeneCompra->cantidad = number_format(intval($item->cantidada_ordencompra ?? 0));
            array_push($CEDFA->subcategory, $CEDFAOrdeneCompra);

            $CEDFAContrato = new stdClass();
            $CEDFAContrato->name = "Contrato";
            $CEDFAContrato->abbreviation = "contrato";
            $CEDFAContrato->monto =  number_format(intval($item->montoa_contrato ?? 0));
            $CEDFAContrato->cantidad = number_format(intval($item->cantidada_contrato ?? 0));
            array_push($CEDFA->subcategory, $CEDFAContrato);

            $CEDFAConsorcio = new stdClass();
            $CEDFAConsorcio->name = "Como consorcio";
            $CEDFAConsorcio->abbreviation = "consorcio";
            $CEDFAConsorcio->monto =  number_format(intval($item->montoa_consorcio ?? 0));
            $CEDFAConsorcio->cantidad = number_format(intval($item->cantidada_consorcio ?? 0));
            array_push($CEDFA->subcategory, $CEDFAConsorcio);

            array_push($item->dataList->categorys, $CEDFA);
        });

        return $data;
    }
}
