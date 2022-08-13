<?php

use App\Http\Controllers\ControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v2\MajorController;
use App\Http\Controllers\v2\FacultyController;
use App\Http\Controllers\v2\AuthController;

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

Route::group(['prefix' => 'major'], function () {
    Route::get('/', [MajorController::class, 'index']);
    Route::get('/{id}', [MajorController::class, 'show']);
    Route::post('/', [MajorController::class, 'store']);
    Route::put('/{id}', [MajorController::class, 'update']);
    Route::delete('/{id}', [MajorController::class, 'delete']);
});

Route::group(['prefix' => 'faculty'], function () {
    Route::get('/', [FacultyController::class, 'index'])->middleware(['auth.guest']);
    Route::get('/{id}', [FacultyController::class, 'show']);
    Route::post('/', [FacultyController::class, 'store']);
    Route::put('/{id}', [FacultyController::class, 'update']);
    Route::delete('/{id}', [FacultyController::class, 'delete']);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('user', [AuthController::class, 'showUser']);
});
