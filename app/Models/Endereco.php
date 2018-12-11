<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model {

    protected $fillable = [
        'sequencia',
        'estado',
        'cidade',
        'bairro',
        'endereco',
        'numero',
        'cep'
    ];
}