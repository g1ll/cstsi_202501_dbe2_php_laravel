<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\ProdutoStoreRequest;
use App\Http\Requests\ProdutoUpdateRequest;
use App\Http\Resources\ProdutoCollectionResource;
use App\Http\Resources\ProdutoResource;
use App\Http\Resources\ProdutoStoredResource;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProdutoCollectionResource(Produto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoStoreRequest $request)
    {
        try {
            return new ProdutoStoredResource(Produto::create($request->validated()));
        } catch (\Exception $e) {
            return $this->errorHandler('Erro ao criar produto',$e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return new ProdutoResource($produto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoUpdateRequest $request, Produto $produto)
    {
        try {
            $produto->update($request->validated());
            return new ProdutoResource($produto);
        } catch (\Exception $e) {
            return $this->errorHandler('Erro ao atualizar produto',$e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        try {
            $produto->delete();
            return new ProdutoResource($produto)->additional([
                    'message' => 'Produto deletado com sucesso!'
                ]);
        } catch (\Exception $e) {
            return $this->errorHandler('Erro ao atualizar produto',$e);
        }
    }
}
