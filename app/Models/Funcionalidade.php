<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionalidade extends Model {

    protected $fillable = [
        'sequencia',
        'titulo',
        'subtitulo',
        'icons'
    ];
    

}
