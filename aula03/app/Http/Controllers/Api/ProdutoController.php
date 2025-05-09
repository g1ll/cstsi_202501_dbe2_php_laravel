<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoStoreRequest;
use App\Http\Resources\ProdutoCollectionResource;
use App\Http\Resources\ProdutoResource;
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
            $produtoCriado = Produto::create($request->validated());
            return (new ProdutoResource($produtoCriado))
                ->additional([
                    'message' => 'Produto criado com sucesso',
                ])->response()
                ->setStatusCode(201);
        } catch (\Exception $e) {
            $response = [
                'message' => 'Erro ao criar produto',
            ];
            if (env("APP_DEBUG")) {
                $response = [
                    ...$response,
                    'exception' => $e,
                    'error' => $e->getMessage(),
                    'trace' => $e->getTrace(),
                ];
            }
            return response()->json($response, 500);
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
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
