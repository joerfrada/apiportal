<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/saml', [LoginController::class, 'saml'])->name('saml');
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('info', function() {
    dd(phpinfo());
});