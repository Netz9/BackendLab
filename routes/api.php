<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PersonController;
use App\Http\Controllers\API\tareaController;
use App\Http\Controllers\API\InscripcionController;
use App\Http\Controllers\API\ParcialController;
use App\Http\Controllers\API\vehiculoController;
use App\Http\Controllers\API\tipoplacaController;
use App\Http\Controllers\API\TareasController;

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

Route::prefix('persons')->group(function () {
    Route::get('/',[ PersonController::class, 'get']);
    Route::post('/',[ PersonController::class, 'create']);
    Route::get('/{id}',[ PersonController::class, 'getById']);
    Route::put('/{id}',[ PersonController::class, 'update']);
    Route::delete('/{id}',[ PersonController::class, 'delete']);
});


Route::prefix('inscrip')->group(function () {
    Route::get('/getall',[ InscripcionController::class, 'get']);
    Route::post('/',[ InscripcionController::class, 'create']);
    Route::get('/{id}',[ InscripcionController::class, 'getById']);
    Route::put('/{id}',[ InscripcionController::class, 'update']);
    Route::delete('/{id}',[ InscripcionController::class, 'delete']);
});

Route::prefix('par')->group(function () {
    Route::get('/getTodos',[ ParcialController::class, 'get']);
    Route::post('/new',[ ParcialController::class, 'create']);
    Route::get('/{id}',[ ParcialController::class, 'getById']);
    Route::put('/{id}',[ ParcialController::class, 'update']);
    Route::delete('/{id}',[ ParcialController::class, 'delete']);
});

Route::prefix('vehiculo')->group(function () {
    Route::get('/get',[ vehiculoController::class, 'get']);
    Route::post('/create',[ vehiculoController::class, 'create']);
    Route::get('/get/{id}',[ vehiculoController::class, 'getById']);
    Route::put('/update/{id}',[ vehiculoController::class, 'update']);
    Route::delete('/delete/{id}',[ vehiculoController::class, 'delete']);
});

Route::prefix('tipoplaca')->group(function () {
    Route::get('/get',[ tipoplacaController::class, 'get']);
    Route::get('/get/{id}',[ tipoplacaController::class, 'getById']);
});

Route::prefix('tarea')->group(function () {
    Route::get('/get',[ TareasController::class, 'get']);
    Route::post('/create',[ TareasController::class, 'create']);
    Route::get('/get/{id}',[ TareasController::class, 'getById']);
    Route::put('/update/{id}',[ TareasController::class, 'update']);
    Route::delete('/delete/{id}',[ TareasController::class, 'delete']);
});