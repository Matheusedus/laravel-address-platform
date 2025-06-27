<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function allPaginated($perPage = 10)
    {
        return User::with('address')->paginate($perPage);
    }

    public function find($id)
    {
        return User::with('address')->findOrFail($id);
    }

    public function create(array $userData, array $addressData)
    {
        return DB::transaction(function () use ($userData, $addressData) {
            $user = User::create($userData);
            $user->address()->create($addressData);
            return $user->load('address');
        });
    }
}
