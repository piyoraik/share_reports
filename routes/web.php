<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;

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

// LoginController
Route::get('/', [LoginController::class, 'gologin'])->name('getlogin');
Route::post('/login', [LoginController::class, 'login'])->name('postlogin');
Route::post("/logout", [LoginController::class, "logout"])->name('logout');

// ReportController
Route::prefix('reports')->group(function(){
	Route::get('/showList', [ReportController::class, 'index'])->middleware('logincheck')->name('reportIndex');
});
