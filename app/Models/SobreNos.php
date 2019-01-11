<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SobreNos extends Model {

    protected $fillable = [
        'sequencia',
        'imagem',
        'atributo_alt',
        'atributo_title',
        'video',
        'titulo',
        'subtitulo',
        'trecho'
    ];

}
