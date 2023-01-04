<?php

use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\GlosarioContoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Indices\CrcController;
use App\Http\Controllers\Indices\FraccionamientoController;
use App\Http\Controllers\MapaEntidadGraficoController;
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

#Ruta inicial
Route::get('/{period?}', [SectionController::class, 'index']);
#Ranking entidad
Route::get('/ranking/entidad', [SectionController::class, 'index']);




//Ruta al darle clic en una regiòn del mapa
Route::get('/detail-deparment-period/{department}/{period}', [DepartmentController::class, 'index']);



// Route::post('/search', [HomeController::class, 'busqueda'])->name('busqueda');
// Route::get('/detalle1/{ruc}/{type}/{entidad}', [HomeController::class, 'detalle1'])->name('detalle1');
// Route::get('/detalle2/{rucEntidad}/{rucContratista}/{type}/{contratista}/{entidad}', [HomeController::class, 'detalle2'])->name('detalle2');


#Rankings - Home
#Entidad
Route::get('/ranking/entidad/{period}', [RankingSearchController::class, 'rankingEntidad']);
Route::post('/ranking/entidad/search/{period}', [RankingSearchController::class, 'searchEntidad'])->name('entidad.busqueda');
#proveedores
Route::get('/ranking/proveedor/{period}', [RankingSearchController::class, 'rankingProveedor']);
Route::post('/ranking/proveedor/search/{period}', [RankingSearchController::class, 'searchProveedor'])->name('proveedor.busqueda');
#funcionario
Route::get('/ranking/funcionario/{period}', [RankingSearchController::class, 'rankingFuncionario']);
Route::post('/ranking/funcionario/search/{period}', [RankingSearchController::class, 'searchFuncionario'])->name('funcionario.busqueda');

#Detalles
#Detalle - 1 - funcionario
Route::get('/detail/funcionario/{idFuncionario}/{nivel}/{type}/{name}/{ruc?}', [FuncionarioController::class, 'firstDetail']);
#Detalle - 1 - entidad - grafico - entidad
#Fraccionamiento
Route::get('/detail/first/fraccionamiento/{rucEntidad}/{period}', [FraccionamientoController::class, 'first']);
Route::get('/detail/second/fraccionamiento/{rucContratista}/{rucEntidad}/{period}/{filter}', [FraccionamientoController::class, 'second']);
#CRC
Route::get('/detail/first/crc/{rucEntidad}/{period}', [CrcController::class, 'first']);
Route::get('/detail/second/crc/{rucContratista}/{rucEntidad}/{period}', [CrcController::class, 'second']);




#Otras vistas
#Glosario
Route::get('/glosario/principal', [GlosarioContoller::class, 'index'])->name('glosario.index');
#feedback
Route::get('/usuario/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
#registrar un feddback
Route::post('/save/feedback', [FeedbackController::class, 'created'])->name('feedback.created');
#denuncia
Route::get('/usuario/denuncia', [DenunciaController::class, 'index'])->name('denuncia.index');
#registrar una denuncia
Route::post('/save/denuncia', [DenunciaController::class, 'created'])->name('denuncia.created');
