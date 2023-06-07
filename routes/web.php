<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerBarang;
use App\Http\Controllers\ControllerFgPerformance;
use App\Http\Controllers\ControllerRmPerformance;
use App\Http\Controllers\ControllerCustomer;
use App\Http\Controllers\ControllerVendor;
use App\Http\Controllers\ControllerLine;
use App\Http\Controllers\ControllerRak;
use App\Http\Controllers\ControllerSummery;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ControllerUser;
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
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/auth/response', [AuthController::class, 'response']);

Route::middleware('auth')->group(function () {

	//Route User
	Route::get('/master/user', [ControllerUser::class, 'user']);
	Route::post('/add/user', [ControllerUser::class, 'create']);
	Route::post('/update/user/{id}', [ControllerUser::class, 'update']);

	Route::get('/logout', [AuthController::class, 'logout']);
	Route::get('dashboard', [HomeController::class, 'dashboard']);
//Route customer
	Route::get('/master/customer', [ControllerCustomer::class, 'index']);
	Route::post('/create/customer', [ControllerCustomer::class, 'create']);
	Route::post('/update/customer/{id}', [ControllerCustomer::class, 'update']);
	Route::get('/delete/customer/{id}', [ControllerCustomer::class, 'delete']);

//Route Vndor
	Route::get('/master/vendor', [ControllerVendor::class, 'index']);
	Route::post('/create/vendor', [ControllerVendor::class, 'create']);
	Route::post('/update/vendor/{id}', [ControllerVendor::class, 'update']);
	Route::get('/delete/vendor/{id}', [ControllerVendor::class, 'delete']);

//Route Line
	Route::get('/master/line', [ControllerLine::class, 'index']);
	Route::post('/create/line', [ControllerLine::class, 'create']);
	Route::post('/update/line/{id}', [ControllerLine::class, 'update']);
	Route::get('/delete/line/{id}', [ControllerLine::class, 'delete']);

//Route Rak
	Route::get('/master/rak', [ControllerRak::class, 'index']);
	Route::post('/create/rak', [ControllerRak::class, 'create']);
	Route::post('/update/rak/{id}', [ControllerRak::class, 'update']);
	Route::get('/delete/rak/{id}', [ControllerRak::class, 'delete']);

//Route fg performance
	

//Route rm performance
	

	//Route Summery
	Route::get('/summery', [ControllerSummery::class, 'index']);
});

Route::get('fg_performance', [ControllerFgPerformance::class, 'Qr']);
Route::post('/create/part', [ControllerFgPerformance::class, 'create']);

Route::get('/cetak/pdf/fg', [ControllerFgPerformance::class, 'cetak_pdf']);
Route::get('/export/excel/fg', [ControllerFgPerformance::class, 'cetak_excel']);
Route::get('/data/barang/{id}', [ControllerBarang::class, 'index']);
Route::get('/data/rm-performance/{id}', [ControllerRmPerformance::class, 'detail']);
Route::get('rm_performance', [ControllerRmPerformance::class, 'Qr']);
Route::post('/create/rm_performance', [ControllerRmPerformance::class, 'create']);

Route::get('/cetak/pdf/rm', [ControllerRmPerformance::class, 'cetak_pdf']);
Route::get('/export/excel/rm', [ControllerRmPerformance::class, 'cetak_excel']);


