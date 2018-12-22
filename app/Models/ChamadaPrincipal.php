<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChamadaPrincipal extends Model {

    protected $fillable = [
        'titulo',
        'subtitulo',
        'video',
        'botao_texto',
        'botao_link'
    ];

}
