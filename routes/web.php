<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vehiculoController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('vehiculo')->group(function () {
    Route::get('/get',[ vehiculoController::class, 'get']);
    Route::post('/create',[ vehiculoController::class, 'create']);
    Route::get('/get/{id}',[ vehiculoController::class, 'getById']);
    Route::put('/update{id}',[ vehiculoController::class, 'update']);
    Route::delete('/delete/{id}',[ vehiculoController::class, 'delete']);
});