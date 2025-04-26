<?php

namespace App\Http\Controllers;

use App\Models\ListaCarro;
use App\Http\Requests\UpdateListaCarroRequest;
use App\Http\Requests\StoreListaCarroRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class ListaCarroController extends Controller
{

    protected $carro;

    public function __construct (ListaCarro $carros){
        $this->carro = $carros;
    }

    public function index(): JsonResponse
    {
        $carros = $this->carro->all();

        return response()->json($carros, Response::HTTP_OK);
    }

    public function store(StoreListaCarroRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')){
            $path = $request->file('image')->store('carros', 'public');
            $data['image'] = url('storage/'.$path);
        }

        $carros = $this->carro->create($data);
        $id = $carros->id;
        $carros = $this->carro->with('categoria')->findOrFail($id);

        return response()->json($carros, Response::HTTP_CREATED);
    }

    public function update(UpdateListaCarroRequest $request, $id): JsonResponse
    {
        $carros = $this->carro->findOrFail($id);

        $data = $request->validated();

        if($request->hasFile('image')){
            try{
                $image_name = explode('carros/', $carros['image']);
                Storage::disk('public')->delete('carros/'.$image_name[1]);
            } catch(Throwable){
                $path = $request->file('image')->store('carros', 'public');
                $data['image'] = url('storage/'.$path);
            }
        }

        $carros->update($data);

        return response()->json($carros, Response::HTTP_OK);
    }

    public function destroy($id): JsonResponse
    {
        $carros = $this->carro->findOrFail($id);

        $carros->delete();

        return response()->json(['message' => 'Carro deletado com sucesso']);
    }
}
