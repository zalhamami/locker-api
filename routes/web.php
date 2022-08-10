<?php

use App\Http\Controllers\ControllerAPI;
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

Route::post('APIClose', [ControllerAPI::class, 'APIClose']);
Route::post('APIOpen', [ControllerAPI::class, 'APIOpen']);

Route::get('APIPresensi', [ControllerAPI::class, 'presensi']);
Route::get('APIHistoryl1', [ControllerAPI::class, 'historyl1']);
Route::post('APIAllLoker', [ControllerAPI::class, 'APIAllLoker']);
Route::post('APIFinish', [ControllerAPI::class, 'APIFinish']);
Route::post('APIRegister', [ControllerAPI::class, 'APIRegister']);
Route::post('APIRegister1', [ControllerAPI::class, 'APIRegister1']);
Route::post('APIRegister2', [ControllerAPI::class, 'APIRegister2']);
Route::post('APILogin', [ControllerAPI::class, 'APILogin']);
Route::post('APICheck', [ControllerAPI::class, 'APICheck']);

// Route::get('/', function () {
//     // return view('welcome');
// });
