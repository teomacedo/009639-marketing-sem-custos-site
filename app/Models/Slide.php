<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model {

    protected $fillable = [
        'ativo',
        'sequencia',
        'nome',
        'imagem',
        'imagem_small',
        'titulo_desktop',
        'titulo_small',
        'subtitulo_desktop',
        'subtitulo_small',
        'botao_texto',
        'botao_link',
        'banner_blog_vertical',
        'banner_blog_horizontal',
        'banner_blog_botao_texto',
        'banner_blog_botao_link',
        'exibicao_inicio',
        'exibicao_fim'
    ];

}
