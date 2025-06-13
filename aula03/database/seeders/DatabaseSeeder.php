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

        Fornecedor::factory(10)
            ->hasProdutos(10)
            ->create();
    }
}
