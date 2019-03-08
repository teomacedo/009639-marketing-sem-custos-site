<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteExibivel extends Model {

    protected $fillable = [
        'cliente',
        'sequencia'
    ];

}
