<?php

namespace App\Http\Requests;

use App\Models\Produto;

class ProdutoUpdateRequest extends ProdutoStoreRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'nullable|string|max:255',
            'preco' => 'nullable|numeric',
            'descricao' => 'nullable|string',
            'qtd_estoque' => 'nullable|integer',
            'importado' => ['nullable']
        ];
    }
}
