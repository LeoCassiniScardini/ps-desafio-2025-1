<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Requests\StoreCategoriaRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class CategoriaController extends Controller
{

    protected $categoria;

    public function __construct (Categoria $categoria){
        $this->categoria = $categoria;
    }

    public function index(): JsonResponse
    {
        $categorias = $this->categoria->get();

        return response()->json($categorias, Response::HTTP_OK);
    }

    public function store(StoreCategoriaRequest $request): JsonResponse
    {
        $data = $request->validated();

        $categorias = $this->categoria->create($data);

        return response()->json($categorias, Response::HTTP_CREATED);
    }

    public function show($id): JsonResponse
    {
        $categorias = $this->categoria->findOrFail($id);

        return response()->json($categorias, Response::HTTP_OK);
    }

    public function update(UpdateCategoriaRequest $request, $id): JsonResponse
    {
        $data = $request->validated();

        $categorias = $this->categoria->findOrFail($id);

        $categorias->update($data);

        return response()->json($categorias, Response::HTTP_OK);
    }

    public function destroy($id): JsonResponse
    {
        $categorias = $this->categoria->findOrFail($id);

        $categorias->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
