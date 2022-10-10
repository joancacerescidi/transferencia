<?php

use App\Http\Controllers\HomeController;
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



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'busqueda'])->name('busqueda');
Route::get('/detalle1/{ruc}', [HomeController::class, 'detalle1'])->name('detalle1');
Route::get('/detalle2/{ruc}', [HomeController::class, 'detalle2'])->name('detalle2');

Route::get('/detalle', function () {
    return view('detail');
});

Route::get('/detalle2', function () {
    return view('detail2');
});


Route::get('/search', function () {
    return view('search');
});
