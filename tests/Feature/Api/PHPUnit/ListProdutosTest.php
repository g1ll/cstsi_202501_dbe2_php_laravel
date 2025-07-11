<?php

namespace Tests\Feature\Api\PHPUnit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProdutosTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_list_produtos_da_api_e_resposta_em_json(): void
    {

        $URL = '/api/v1/produtos';      //ARRANGE
        $response = $this->get($URL);    //ACT
        //ASSERT
        $response->assertStatus(200);
        // $response->assertJsonIsArray();
        $response->assertJsonIsObject();
    }
}
