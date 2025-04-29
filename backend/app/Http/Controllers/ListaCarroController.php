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

    public function __construct (ListaCarro $carro){
        $this->carro = $carro;
    }

    public function index(): JsonResponse
    {
        $carros = $this->carro->with('categoria')->get();

        return response()->json($carros, Response::HTTP_OK);
    }

    public function store(StoreListaCarroRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')){
            $path = $request->file('image')->store('carro', 'public');
            $data['image'] = url('storage/'.$path);
        }

        $carro = $this->carro->create($data);
        $id = $carro->id;
        $carro = $this->carro->with('categoria')->findOrFail($id);

        return response()->json($carro, Response::HTTP_CREATED);
    }

    public function show($id): JsonResponse
    {
        $carro = $this->carro->with('categoria')->findOrFail($id);

        return response()->json($carro, Response::HTTP_OK);
    }
    
    public function update(UpdateListaCarroRequest $request, $id): JsonResponse
    {
        $carro = $this->carro->with('categoria')->findOrFail($id);

        $data = $request->validated();

        if($request->hasFile('image')){
            try{
                $image_name = explode('carro/', $carro['image']);
                Storage::disk('public')->delete('carro/'.$image_name[1]);
            } catch(Throwable){
            } finally {
                $path = $request->file('image')->store('carro', 'public');
                $data['image'] = url('storage/'.$path);
            }
        }

        $carro->update($data);

        return response()->json($carro, Response::HTTP_OK);
    }

    public function destroy($id): JsonResponse
    {
        $carro = $this->carro->findOrFail($id);

        $carro->delete();

        return response()->json(['message' => 'Carro deletado com sucesso']);
    }
}
