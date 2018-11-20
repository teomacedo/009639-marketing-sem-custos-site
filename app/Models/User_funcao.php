<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_funcao extends Model {

    public function possibilidades() {
        return $this->belongsToMany(User_possibilidade::class, 'user_funcao_possib_rels', 'funcao_id', 'possib_id');
    }

}
