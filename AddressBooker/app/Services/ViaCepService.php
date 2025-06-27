<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ViaCepService
{
    public function getAddressData(string $cep): ?array
    {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        if ($response->failed() || isset($response['erro'])) {
            return null;
        }
        return [
            'cep' => $response['cep'] ?? '',
            'logradouro' => $response['logradouro'] ?? '',
            'bairro' => $response['bairro'] ?? '',
            'cidade' => $response['localidade'] ?? '',
            'estado' => $response['uf'] ?? '',
        ];
    }
}
