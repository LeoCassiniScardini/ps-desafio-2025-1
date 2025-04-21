<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Http\Requests\VeiculoRequest;
use Illuminate\Http\JsonResponse;

class VeiculoController extends Controller
{
    public function index(): JsonResponse
    {
        $veiculos = Veiculo::all();
        return response()->json($veiculos);
    }

    public function show($id): JsonResponse
    {
        $veiculo = Veiculo::findOrFail($id);
        return response()->json($veiculo);
    }

    public function store(VeiculoRequest $request): JsonResponse
    {
        $veiculo = Veiculo::create($request->validated());
        return response()->json($veiculo, 201);
    }

    public function update(VeiculoRequest $request, $id): JsonResponse
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->update($request->validated());
        return response()->json($veiculo);
    }

    public function destroy($id): JsonResponse
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();
        return response()->json(null, 204);
    }
}
