<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Estado;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            if (Estado::all()->count()) {
                Log::channel('stderr')->info("O banco já possui estados cadastrados!");
                print_r(Estado::all()->pluck('nome','id'));
                return;
            }

            $jsonUrl = 'https://raw.githubusercontent.com/chandez/Estados-Cidades-IBGE/master/json/estados.json';
            $response = Http::get($jsonUrl);
            $estados = $response->json()['data'];

            if (!$estados)
                throw new \Exception("Erro ao carregar arquivo JSON de Estados!\nURL:$jsonUrl");

            $listEstados = [];
            foreach ($estados as $estado)
                $listEstados[] = [
                    "nome"      =>  $estado['Nome'],
                    "codigouf"  =>  $estado["CodigoUf"],
                    "uf"        =>  $estado["Uf"],
                    "regiao_id" =>  $estado["Regiao"]
                ];

            if (!Estado::insert($listEstados))
                throw new \Exception("Erro ao inserir estados!", 1);

            Log::channel('stderr')->info("Estados inseridos com sucesso!");
            print_r(Estado::all()->pluck('uf','id'));
        } catch (\Exception $error) {
            throw new \Exception("Erro ao processar o seed de estados!\n {$error->getMessage()}");
        }
    }
}
