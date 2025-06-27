<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();

        $this->call([
            AdminSeeder::class,
            RegiaoSeeder::class,
            EstadoSeeder::class
        ]);

        // Fornecedor::factory(10)->create();
        // Produto::factory(10)->create();

        // Fornecedor::factory(10)
        //     ->has(Produto::factory(10))
        //     ->create();

        // Fornecedor::factory(10)
        //     ->hasProdutos(10)
        //     ->hasMedia(1)
        //     ->create();

        Fornecedor::factory(10)
            ->has(Produto::factory(10)
                    ->hasMedia(2)
            )
            ->hasMedia(1)
            ->create();

        // new PromocaoSeeder()->run();
        // new ProdutoPromocaoSeeder()->run();

        $this->call([
            PromocaoSeeder::class,
            ProdutoPromocaoSeeder::class,
            MediaSeeder::class
        ]);
      }
}
