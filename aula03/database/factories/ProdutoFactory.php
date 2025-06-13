<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $max = Fornecedor::all()->count();
        // if(!$max)return [];
        return [
            "nome"=>fake()->sentence(5),
            "descricao"=>fake()->sentence(20),
            "preco"=>fake()->randomFloat(2, 10, 10000),
            "qtd_estoque"=>fake()->randomNumber(2,10,10000),
            "importado"=>fake()->numberBetween(0,1),
            // "fornecedor_id"=>fake()->numberBetween(1, $max)
        ];
    }
}
