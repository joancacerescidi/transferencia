<?php

use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FuenteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\GlosarioContoller;
use App\Http\Controllers\GovernmentLevelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Incides\PrcController;
use App\Http\Controllers\Indices\AdiController;
use App\Http\Controllers\Indices\CrcController;
use App\Http\Controllers\Indices\FraccionamientoController;
use App\Http\Controllers\Indices\PmrController as IndicesPmrController;
use App\Http\Controllers\Indices\PrcController as IndicesPrcController;
use App\Http\Controllers\MapaEntidadGraficoController;
use App\Http\Controllers\PmrController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\RankingSearchController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Data para el Section
#Ruta inicial
Route::get('/{period?}', [SectionController::class, 'index']);
#Ranking entidad
Route::get('/ranking/entidad', [SectionController::class, 'index']);




//Ruta al darle clic en una regiòn del mapa
Route::get('/detail-deparment-period/{department}/{period}/{orderTable}', [DepartmentController::class, 'index']);
//Ruta al darle clic al grafico de data por nivel de gobierno
Route::get('/detail-government-level/{nivel}/{period}/{orderTable}', [GovernmentLevelController::class, 'index']);


#Rankings
#Entidad
Route::get('/ranking/entidad/search/{period}/{order}/{busquedaPalabra}', [RankingSearchController::class, 'searchEntidad']);
Route::get('/ranking/entidad/{period}/{order}', [RankingSearchController::class, 'rankingEntidad'])->name('rankingEnidad');
#proveedores
Route::get('/ranking/proveedor/{period}/{orderTable}', [RankingSearchController::class, 'rankingProveedor'])->name('rankingProveedor');
Route::get('/ranking/proveedor/search/{period}/{busquedaPalabra}/{orderTable}', [RankingSearchController::class, 'searchProveedor']);
#funcionario
Route::get('/ranking/funcionario/{period}/{orderTable}', [RankingSearchController::class, 'rankingFuncionario'])->name('rankingFuncionario');
Route::get('/ranking/funcionario/search/{period}/{busquedaPalabra}/{orderTable}', [RankingSearchController::class, 'searchFuncionario']);


#Detalles
#Detalle - 1 - funcionario
Route::get('/detail/funcionario/{idFuncionario}/{nivel}/{type}/{name}/{period}/{orderTable}/{ruc?}/{busquedaPalabra?}', [FuncionarioController::class, 'firstDetail']);


#Detalle - 1-2 - entidad - grafico - entidad
#Fraccionamiento
Route::get('/detail/first/fraccionamiento/{rucEntidad}/{period}/{nameEntidad}/{ruta}/{primaryVariable}/{orderTable}/{busquedaPalabra?}', [FraccionamientoController::class, 'first']);
Route::get('/detail/second/fraccionamiento/{rucContratista}/{rucEntidad}/{period}/{filter}/{nameEntidad}/{ruc}/{nameRuc}/{ruta}/{primaryVariable}/{orderTable}/{busquedaPalabra?}', [FraccionamientoController::class, 'second']);
#CRC
Route::get('/detail/first/crc/{rucEntidad}/{period}/{nameEntidad}/{ruta}/{primaryVariable}/{orderTable}/{busquedaPalabra?}', [CrcController::class, 'first']);
Route::get('/detail/second/crc/{rucContratista}/{rucEntidad}/{period}/{nameEntidad}/{ruc}/{ruta}/{primaryVariable}/{orderTable}/{nameRuc?}/{busquedaPalabra?}', [CrcController::class, 'second']);
#ADI
Route::get('/detail/first/adi/{rucEntidad}/{period}/{nameEntidad}/{ruta}/{primaryVariable}/{orderTable}/{busquedaPalabra?}', [AdiController::class, 'first']);
Route::get('/detail/second/adi/{rucContratista}/{rucEntidad}/{period}/{nameEntidad}/{ruc}/{nameRuc}/{ruta}/{primaryVariable}/{orderTable}/{busquedaPalabra?}', [AdiController::class, 'second']);
#/PRC 
Route::get('/detail/first/prc/{rucEntidad}/{period}/{nameEntidad}/{ruta}/{primaryVariable}/{orderTable}/{busquedaPalabra?}', [IndicesPrcController::class, 'first']);
Route::get('/detail/second/prc/{rucContratista}/{rucEntidad}/{period}/{filter}/{nameEntidad}/{ruc}/{nameRuc}/{ruta}/{primaryVariable}/{orderTable}/{busquedaPalabra?}', [IndicesPrcController::class, 'second']);
#/PMR
Route::get('/detail/first/pmr/{rucEntidad}/{period}/{nameEntidad}/{ruta}/{primaryVariable}/{orderTable}/{busquedaPalabra?}', [IndicesPmrController::class, 'first']);
Route::get('/detail/second/pmr/{rucContratista}/{rucEntidad}/{period}/{nameEntidad}/{ruc}/{nameRuc}/{ruta}/{primaryVariable}/{orderTable}/{busquedaPalabra?}', [IndicesPmrController::class, 'second']);





#Detalle - 1- 2 proveedor
#orden de compra
Route::get('/detail/orden-compra/first/proveedor/{rucContratista}/{period}/{orderTable}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'ordenCompraFirst']);
Route::get('/detail/orden-compra/second/proveedor/{rucEntidad}/{rucContratista}/{period}/{ruc}/{rucNombre}/{orderTable}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'ordenCompraSecond']);
#contrato
Route::get('/detail/contrato/first/proveedor/{rucContratista}/{period}/{orderTable}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'contratoFirst']);
Route::get('/detail/contrato/second/proveedor/{rucEntidad}/{rucContratista}/{period}/{ruc}/{rucNombre}/{orderTable}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'contratoSecond']);
#consorcio
Route::get('/detail/consorcio/first/proveedor/{rucContratista}/{period}/{filter}/{orderTable}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'consorcioFirst']);
Route::get('/detail/consorcio/second/proveedor/{rucEntidad}/{rucContratista}/{period}/{filter}/{ruc}/{rucNombre}/{orderTable}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'consorcioSecond']);
#sanciones
Route::get('/detail/sanciones/first/proveedor/{rucContratista}/{period}/{orderTable}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'sancionesFirst']);
#contrato resuelto
Route::get('/detail/contrato-resuelto/first/proveedor/{rucContratista}/{period}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'contratoResueltoFirst']);
Route::get('/detail/contrato-resuelto/second/proveedor/{rucEntidad}/{rucContratista}/{period}/{ruc}/{rucNombre}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'contratoResueltoSecond']);
#postulaciones
Route::get('/detail/postulaciones/first/proveedor/{rucContratista}/{period}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'postulacionesFirst']);
Route::get('/detail/postulaciones/second/proveedor/{rucEntidad}/{rucContratista}/{period}/{ruc}/{rucNombre}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'postulacionesSecond']);
#Postulaciones con mismo representante
Route::get('/detail/postulaciones-con-mismo-representante/first/proveedor/{rucContratista}/{period}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'postulacionesMismoRepresentanteFirst']);
Route::get('/detail/postulaciones-con-mismo-representante/second/proveedor/{rucEntidad}/{rucContratista}/{period}/{ruc}/{rucNombre}/{nombre?}/{busquedaPalabra?}', [ProveedorController::class, 'postulacionesMismoRepresentanteSecond']);




#Otras vistas
#Glosario
Route::get('/glosario/principal', [GlosarioContoller::class, 'index'])->name('glosario.index');
#feedback
Route::get('/usuario/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
#registrar un feddback
Route::post('/save/feedback', [FeedbackController::class, 'created'])->name('feedback.created');
#denuncia
Route::get('/usuario/comparte-informacion', [DenunciaController::class, 'index'])->name('denuncia.index');
#registrar una denuncia
Route::post('/save/denuncia', [DenunciaController::class, 'created'])->name('denuncia.created');
#fuentes
Route::get('/usuario/fuentes', [FuenteController::class, 'index'])->name('fuente.index');
