<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        try {

            $request->validate([
                'nome' => 'required|string|max:255',
                'preco' => 'required|numeric',
                'descricao' => 'required|string',
                'qtd_estoque' => 'required|integer',
                'importado' => ['nullable']
            ]);

            $produto = $request->all();
            $produto['importado'] = $request->has('importado');

            Produto::create($produto);
            return response()->json([
                'message' => 'Produto criado com sucesso!',
                'data' => $produto
            ], 201);
        } catch (ValidationException $e) {
            throw $e;
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
