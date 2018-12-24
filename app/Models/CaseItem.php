<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseItem extends Model {

    protected $fillable = [
        'sequencia',
        'imagem',
        'titulo',
        'citacao',
        'nome_cliente',
        'nome_loja',
        'link_loja',
        'link_artigo',
        'video'
    ];

}
