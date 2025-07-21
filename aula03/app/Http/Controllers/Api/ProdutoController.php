<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Requests\ProdutoStoreRequest;
use App\Http\Requests\ProdutoUpdateRequest;
use App\Http\Resources\ProdutoCollectionResource;
use App\Http\Resources\ProdutoResource;
use App\Http\Resources\ProdutoStoredResource;
use App\Models\Media;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProdutoCollectionResource(Produto::all()->load('media'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoStoreRequest $request)
    {
        try {
            $newProduto = $request->validated();
            if($request->file('imagem')){
                $fileName = $request->file('imagem')->hashName();
                if(!$request->file('imagem')->store('produtos','public'))
                    throw new Exception('Erro ao salvar imagem do produto!!');

                $newModelProduto=Produto::create($newProduto);
                $newModelProduto->media()->create([
                    'source'=>$fileName
                ]);
            }else{
                $newModelProduto=Produto::create($newProduto);
            }
            return new ProdutoStoredResource($newModelProduto->load('media','fornecedor'));
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
    public function destroy(Request $request, Produto $produto)
    {
        $statusHttpError = 500;
        try {
            if(!$request->user()->tokenCan('is-admin')){
                throw new Exception("Não permitido!!");
                $statusHttpError = 403;
            }
            $produto->delete();
            return new ProdutoResource($produto)->additional([
                    'message' => 'Produto deletado com sucesso!'
                ]);
        } catch (\Exception $e) {
            return $this->errorHandler('Erro ao deletar produto',$e,$statusHttpError);
        }
    }
}
