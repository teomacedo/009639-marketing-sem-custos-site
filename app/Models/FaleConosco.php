<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaleConosco extends Model {

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'mensagem',
        'status'
    ];

}
