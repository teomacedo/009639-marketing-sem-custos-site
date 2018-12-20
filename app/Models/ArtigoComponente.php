<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtigoComponente extends Model {

    protected $fillable = [
        'sequencia',
        'imagem',
        'imagem_altura',
        'imagem_altura_mobile',
        'video',
        'titulo',
        'subtitulo',
        'trecho',
        'artigo_id'
    ];

}
