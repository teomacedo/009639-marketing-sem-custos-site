<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assinante extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'notificar'
    ];
}
