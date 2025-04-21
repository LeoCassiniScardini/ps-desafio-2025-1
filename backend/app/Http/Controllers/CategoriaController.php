<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\Http\JsonResponse;

class CategoriaController extends Controller
{
    public function index(): JsonResponse
    {
        $categorias = Categoria::with('veiculo')->get();
        return response()->json($categorias);
    }

    public function show($id): JsonResponse
    {
        $categoria = Categoria::with('veiculo')->findOrFail($id);
        return response()->json($categoria);
    }

    public function store(CreateCategoriaRequest $request): JsonResponse
    {
        $categoria = Categoria::create($request->validated());
        return response()->json($categoria, 201);
    }

    public function update(UpdateCategoriaRequest $request, $id): JsonResponse
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->validated());
        return response()->json($categoria);
    }

    public function destroy($id): JsonResponse
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return response()->json(null, 204);
    }
}
