<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Http\Requests\UpdateVeiculoRequest;
use App\Http\Requests\StoreVeiculoRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class VeiculoController extends Controller
{

    protected $veiculo;

    public function __construct (Veiculo $veiculo){
        $this->veiculo = $veiculo;
    }

    public function index(): JsonResponse
    {
        $vaiculos = $this->veiculo->with('categoria')->get();

        return response()->json($vaiculos, Response::HTTP_OK);
    }

    public function store(StoreVeiculoRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('imagem')){
            $path = $request->file('imagem')->store('veiculo', 'public');
            $data['imagem'] = url('storage/'.$path);
        }

        $veiculo = $this->veiculo->create($data);
        $id = $veiculo->id;
        $veiculo = $this->veiculo->with('categoria')->findOrFail($id);

        return response()->json($veiculo, Response::HTTP_CREATED);
    }

    public function show($id): JsonResponse
    {
        $veiculo = $this->veiculo->with('categoria')->findOrFail($id);

        return response()->json($veiculo, Response::HTTP_OK);
    }
    
    public function update(UpdateVeiculoRequest $request, $id): JsonResponse
    {
        $veiculo = $this->veiculo->with('categoria')->findOrFail($id);

        $data = $request->validated();

        if($request->hasFile('imagem')){
            try{
                $image_name = explode('veiculo/', $veiculo['imagem']);
                Storage::disk('public')->delete('veiculo/'.$image_name[1]);
            } catch(Throwable){
            } finally {
                $path = $request->file('imagem')->store('veiculo', 'public');
                $data['imagem'] = url('storage/'.$path);
            }
        }

        $veiculo->update($data);

        return response()->json($veiculo, Response::HTTP_OK);
    }

    public function destroy($id): JsonResponse
    {
        $veiculo = $this->veiculo->findOrFail($id);

        $veiculo->delete();

        return response()->json(['message' => 'veiculo deletado com sucesso']);
    }
}
