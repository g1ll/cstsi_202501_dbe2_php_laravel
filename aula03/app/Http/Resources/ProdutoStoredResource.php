<?php

namespace App\Http\Resources;

use App\Models\Produto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProdutoStoredResource extends ProdutoResource
{

    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->setStatusCode(201,"Produto Criado!");
    }

    public function with($request): array
    {
      return [
          'message' => 'Produto criado com sucesso',
      ];
    }
}
