<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model {

    protected $fillable = [
        'sequencia',
        'questao',
        'resposta',
        'pagina_titulo',
        'pagina_url'
    ];

}
