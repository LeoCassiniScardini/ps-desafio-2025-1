<?php

use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\CategoriaController;
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
    //Route::apiResource('/categorias', CategoriaController::class)->except(['index', 'show']);
    //Route::apiResource('/veiculos', Veiculo::class)->except(['index', 'show']);
});


Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

//Route::get('/categorias', [CategoriaController::class, 'index']);
//Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
//Route::get('/veiculos', [Veiculo::class, 'index']);
//Route::get('/veiculos/{id}', [Veiculo::class, 'show']);


Route::apiResource('/categorias', CategoriaController::class);
Route::apiResource('/veiculos', VeiculoController::class);
Route::post('/veiculos/{id}/comprar', [VeiculoController::class, 'comprar']);


require __DIR__.'/auth.php';
