<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SobreNos extends Model {

    protected $fillable = [
        'sequencia',
        'imagem',
        'titulo',
        'subtitulo',
        'trecho'
    ];

}
