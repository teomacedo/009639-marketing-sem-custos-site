<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtigoCategoria extends Model {

    protected $fillable = [
        'sequencia',
        'imagem',
        'thumbnail',
        'pagina_url',
        'pagina_titulo',
        'nome',
        'subtitulo'
    ];

    public function artigos() {
        return $this->belongsToMany(Artigo::class, 'artigo_categoria_relacs', 'categoria_id');
    }

}
