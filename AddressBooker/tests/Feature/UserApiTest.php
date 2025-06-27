<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    /**
     * Teste de cadastro de usuário via api.
     */
    public function test_cadastra_usuario_via_api()
    {
        $payload = [
            'name' => 'Teste API',
            'email' => 'testeapi@teste.com',
            'password' => '123456',
            'cep' => '01001-000'
        ];

        $response = $this->postJson('/api/users', $payload);

        $response->assertStatus(201);
        $response->assertJsonFragment(['name' => 'Teste API', 'email' => 'testeapi@teste.com']);
        $this->assertDatabaseHas('users', ['email' => 'testeapi@teste.com']);
        $this->assertDatabaseHas('addresses', ['cep' => '01001-000']);
    }
}
