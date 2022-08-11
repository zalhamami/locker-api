<?php

use App\Http\Controllers\ControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v2\MajorController;
use App\Http\Controllers\v2\FacultyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/APILogin', [ControllerAPI::class, 'APILogin']);
// Route::post('/presensi', [ControllerAPI::class, 'presensi']);

Route::group('major', function () {
    Route::get('/', [MajorController::class, 'index']);
    Route::get('/{id}', [MajorController::class, 'show']);
    Route::get('/', [MajorController::class, 'store']);
    Route::put('/{id}', [MajorController::class, 'update']);
    Route::delete('/{id}', [MajorController::class, 'delete']);
});

Route::group('faculty', function () {
    Route::get('/', [FacultyController::class, 'index']);
    Route::get('/{id}', [FacultyController::class, 'show']);
    Route::get('/', [FacultyController::class, 'store']);
    Route::put('/{id}', [FacultyController::class, 'update']);
    Route::delete('/{id}', [FacultyController::class, 'delete']);
});
