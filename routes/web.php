<?php

use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RuleController;
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


Route::redirect('/', '/beranda');
Route::get('/beranda', function(){
	return view('beranda');
});

Route::get('diagnose', [DiagnoseController::class, 'index']);
Route::get('diagnose/fault', [DiagnoseController::class, 'fault']);
Route::get('diagnose/{penyakit}', [DiagnoseController::class, 'show']);
Route::post('diagnose', [DiagnoseController::class, 'index']);
Route::prefix('master')->group(function(){
	Route::resource('gejala', GejalaController::class);
	Route::resource('penyakit', PenyakitController::class);
	Route::get('rule', [RuleController::class, 'index']);
	Route::get('rule/set-rule/{penyakit}/{gejala}', [RuleController::class, 'setRule']);
});