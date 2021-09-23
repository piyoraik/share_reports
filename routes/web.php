<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\LoginController;

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

// TopController
Route::get('/', [TopController::class, 'top'])->name('top');

// LoginController
Route::get('/login', [LoginController::class, 'gologin'])->name('getlogin');
Route::post('/login', [LoginController::class, 'login'])->name('postlogin');

// ReportController
