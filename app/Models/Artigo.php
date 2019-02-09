<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ArtigoCategoria;
use App\Models\ArtigoConclusao;
use App\User;

class Artigo extends Model {

    protected $fillable = [
        'imagem',
        'user_id',
        'thumbnail',
        'titulo',
        'subtitulo',
        'pagina_url',
        'pagina_titulo',
        'meta_description',
        'publicado',
        'artigo_conclusaos_id'
    ];
    
    public function autor(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function categoria(){
        $categorias = $this->belongsToMany(ArtigoCategoria::class, 'artigo_categoria_relacs', 'artigo_id', 'categoria_id');
        return $categorias->first();
    }
    
    public function conclusao(){
        return $this->belongsTo(ArtigoConclusao::class, 'artigo_conclusaos_id');
    }
    
 
    

}
