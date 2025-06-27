<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Validator;

class StoreUserRequestTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Teste de validação de email unico
     */
    public function test_valida_email_unico()
    {
        \App\Models\User::factory()->create(['email' => 'jaexiste@teste.com']);

        $request = new StoreUserRequest();

        $validator = Validator::make(
            [
                'name' => 'Fulano',
                'email' => 'jaexiste@teste.com',
                'password' => '123456',
                'cep' => '01001-000',
            ],
            $request->rules()
        );

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('email', $validator->errors()->messages());
    }
}
