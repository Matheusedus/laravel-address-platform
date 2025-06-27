<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository
{
    public function findByUser($userId)
    {
        return Address::where('user_id', $userId)->first();
    }
}
