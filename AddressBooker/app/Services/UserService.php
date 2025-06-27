<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\ViaCepService;

class UserService
{
    public function __construct(
        protected UserRepository $userRepository,
        protected ViaCepService $viaCepService
    ) {}

    public function listPaginated($perPage = 10)
    {
        return $this->userRepository->allPaginated($perPage);
    }

    public function getById($id)
    {
        return $this->userRepository->find($id);
    }

    public function create(array $userData)
    {
        // Busca dados do endereço pelo CEP
        $addressData = $this->viaCepService->getAddressData($userData['cep']);
        if (!$addressData) {
            throw new \Exception('CEP inválido');
        }
        // Remove 'cep' do $userData se não for campo do usuário
        unset($userData['cep']);
        return $this->userRepository->create($userData, $addressData);
    }
}
