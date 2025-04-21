<?php

namespace App\Http\Controllers;

use App\Models\ListaCarro;
use App\Http\Requests\CreateListaCarroRequest;
use App\Http\Requests\UpdateListaCarroRequest;
use Illuminate\Http\JsonResponse;

class ListaCarroController extends Controller
{
    public function index(): JsonResponse
    {
        $carros = ListaCarro::with('categoria')->get();
        return response()->json($carros);
    }

    public function show($id): JsonResponse
    {
        $carro = ListaCarro::with('categoria')->findOrFail($id);
        return response()->json($carro);
    }

    public function store(CreateListaCarroRequest $request): JsonResponse
    {
        $carro = ListaCarro::create($request->validated());
        return response()->json($carro, 201);
    }

    public function update(UpdateListaCarroRequest $request, $id): JsonResponse
    {
        $carro = ListaCarro::findOrFail($id);
        $carro->update($request->validated());
        return response()->json($carro);
    }

    public function destroy($id): JsonResponse
    {
        $carro = ListaCarro::findOrFail($id);
        $carro->delete();
        return response()->json(null, 204);
    }
}
