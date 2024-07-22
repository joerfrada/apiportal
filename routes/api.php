<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AplicacionController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/aplicacion/getAplicacionesFull', [AplicacionController::class, 'getAplicacionesFull']);
    Route::post('/aplicacion/getAplicacionesTipo', [AplicacionController::class, 'getAplicacionesTipo']);
    Route::post('/aplicacion/getAplicaciones', [AplicacionController::class, 'getAplicaciones']);
    Route::post('/aplicacion/crearAplicaciones', [AplicacionController::class, 'crearAplicaciones']);
    Route::post('/aplicacion/actualizarAplicaciones', [AplicacionController::class, 'actualizarAplicaciones']);
    Route::get('/aplicacion/getTipoAplicaciones', [AplicacionController::class, 'getTipoAplicaciones']);
});