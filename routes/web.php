<?php

use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GlosarioContoller;
use App\Http\Controllers\HomeController;
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

//Ruta inicial
Route::get('/{period?}', [SectionController::class, 'index']);
//Ruta al darle clic en una regiòn del mapa
Route::get('/detail-deparment-period/{department}/{period}', [DepartmentController::class, 'index']);

// Route::post('/search', [HomeController::class, 'busqueda'])->name('busqueda');
// Route::get('/detalle1/{ruc}/{type}/{entidad}', [HomeController::class, 'detalle1'])->name('detalle1');
// Route::get('/detalle2/{rucEntidad}/{rucContratista}/{type}/{contratista}/{entidad}', [HomeController::class, 'detalle2'])->name('detalle2');


#Glosario
Route::get('/glosario/principal', [GlosarioContoller::class, 'index'])->name('glosario.index');
#feedback
Route::get('/usuario/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
#denuncia
Route::get('/usuario/denuncia', [DenunciaController::class, 'index'])->name('denuncia.index');
