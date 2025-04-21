<?php

use App\Http\Controllers\ListaCarroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', function (Request $request) {
        return response()->json(Auth::user(), Response::HTTP_OK);
    });
});

Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
    Route::apiResource('/users', UserController::class);
});

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::apiResource('carros', ListaCarroController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('veiculos', VeiculoController::class);

require __DIR__.'/auth.php';
