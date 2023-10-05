<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagosController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function (){

Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/pagos', [PagosController::class, 'index']); //mostrar todos los registros 
Route::post('/pagos', [PagosController::class, 'store']);//crear un registro
Route::put('/pagos/{id}', [PagosController::class, 'update']);//actualizar un registro
Route::delete('/pagos/{id}', [PagosController::class, 'destroy']);//eliminar un registro

Route::get('/lista', [ListaController::class, 'index']); //mostrar todos los registros de la lista
Route::post('/lista', [ListaController::class, 'store']);//crear un registro para la lista
Route::delete('/lista/{id}', [ListaController::class, 'destroy']);//eliminar un registro de la lista

});