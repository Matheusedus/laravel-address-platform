<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
