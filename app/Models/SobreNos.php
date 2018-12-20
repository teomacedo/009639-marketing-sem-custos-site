<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SobreNos extends Model {

    protected $fillable = [
        'sequencia',
        'imagem',
        'imagem_altura',
        'video',
        'imagem_altura_mobile',
        'titulo',
        'subtitulo',
        'trecho'
    ];

}
