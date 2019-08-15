<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecursoChamada extends Model {

    protected $fillable = [
        'titulo',
        'subtitulo',
        'botao_texto',
        'botao_link'
    ];

}
