<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Media;
use App\Models\Produto;
use App\Models\Fornecedor;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {

            $totalProduto = Produto::count();
            $totalFornecedor = Fornecedor::count();

            $createdAt = Carbon::now()->toDateTimeString();
            $modelProdutoId = fake()->numberBetween(1,$totalProduto);
            $modelFornecedorId = fake()->numberBetween(1,$totalFornecedor);
            $medias = [
                [
                    'model_id'  =>  $modelProdutoId,
                    'model_type'=>  'App\Models\Produto',
                    'source'    =>  'https://www.youtube.com/watch?v=QAfTYrDhdHE',
                    'type'      =>  'video',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt
                ],
                [
                    'model_id'  =>  $modelProdutoId,
                    'model_type'=>  'App\Models\Produto',
                    'source'    =>  'https://www.youtube.com/watch?v=5s-_SnVl-1g',
                    'type'      =>  'video',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt
                ],
                [
                    'model_id'  =>  $modelFornecedorId,
                    'model_type'=>  'App\Models\Fornecedor',
                    'source'    =>  'https://www.youtube.com/watch?v=127ng7botO4',
                    'type'      =>  'video',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt
                ],
                [
                    'model_id'  =>  $modelFornecedorId,
                    'model_type'=>  'App\Models\Fornecedor',
                    'source'    =>  'https://www.youtube.com/watch?v=veSLRzmOfAI',
                    'type'      =>  'video',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt
                ],
                [
                    'model_id'  =>  $modelFornecedorId,
                    'model_type'=>  'App\Models\Fornecedor',
                    'source'    =>  'https://www.youtube.com/watch?v=sBIkA95t1wM',
                    'type'      =>  'video',
                    'created_at'=>  $createdAt,
                    'updated_at'=>  $createdAt
                ],
            ];

            Media::insert($medias)
                ? Log::channel('stderr')->info("Vídeos cadastrados! Fornecedor: $modelFornecedorId | Produto: $modelProdutoId")
                : throw new Exception("Erro ao criar promoções!");

        } catch(Exception $error) {
            Log::debug($error->getMessage());
            Log::channel('stderr')->error($error->getMessage());
        }
    }
}
