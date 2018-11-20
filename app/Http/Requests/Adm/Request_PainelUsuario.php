<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelUsuario extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required|min:5|max:190',
            'email' => 'email|required|max:190|',
            'funcao' => 'required'
        ];
    }

}
