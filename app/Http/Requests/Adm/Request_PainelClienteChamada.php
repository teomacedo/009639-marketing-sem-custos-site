<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelClienteChamada extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'titulo' => 'required'
        ];
    }
}