<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Models\Report;

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

// LoginController：ログイン・ログアウト処理
Route::get('/', [LoginController::class, 'gologin'])->name('getlogin');
Route::post('/login', [LoginController::class, 'login'])->name('postlogin');
Route::post("/logout", [LoginController::class, "logout"])->name('logout');

// ReportController：レポート処理
Route::group(['prefix' => 'reports', 'middleware' => 'logincheck'], function(){
	Route::get('/add', [ReportController::class, 'add'])->name('reportAdd');
	Route::post('/add', [ReportController::class, 'create'])->name('reportCreate');
	Route::get('/showList', [ReportController::class, 'index'])->name('reportIndex');

	// レポート詳細処理
	Route::prefix('showDetail')->group(function(){
		Route::get('/{id}', [ReportController::class, 'show'])->name('reportShow');
		Route::get('/{id}/edit', [ReportController::class, 'edit'])->name('reportEdit');
		Route::patch('/{id}/edit', [ReportController::class, 'update'])->name('reportUpdate');
		Route::delete('/{id}/edit', [ReportController::class, 'delete'])->name('reportDelete');
	});
});
