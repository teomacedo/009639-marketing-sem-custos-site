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

    public function messages() {
        return [
            'name.required' => 'O campo "Nome" precisa ser preenchido',
            'name.min' => 'O campo "Nome" precisa ter no mínimo 5 caracteres',
            'name.min' => 'O campo "Nome" pode ter no máximo 190 caracteres',
            
            'email.email' => 'O campo "E-mail" precisa ser um e-mail válido',
            'email.required' => 'O campo "E-mail" precisa ser preenchido',
            'email.max' => 'O campo "E-mail" pode ter no máximo 190 caracteres',
            
            'funcao.required' => 'O campo "Função" precisa ser preenchido',
        ];
    }

}
