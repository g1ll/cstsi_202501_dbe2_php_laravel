<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'descricao' => 'required|string',
            'qtd_estoque' => 'required|integer',
            'importado' => ['nullable'],
            'fornecedor_id'=> 'required | integer',
            'imagem'=>"nullable | image",
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'preco.required' => 'O campo preço é obrigatório.',
            'preco.numeric' => 'O campo preço deve ser um número.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'qtd_estoque.required' => 'O campo quantidade em estoque é obrigatório.',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'importado' => $this->has('importado'),
        ]);
    }
}
