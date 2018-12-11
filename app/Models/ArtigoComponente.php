<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtigoComponente extends Model {

    protected $fillable = [
            'sequencia',
            'imagem',
            'titulo',
            'subtitulo',
            'trecho',
            'artigo_id'
    ];

}
