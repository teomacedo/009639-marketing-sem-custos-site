<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelAssinante extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email' => 'email|required|max:190',
            'nome' => 'required|min:5|max:190'
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'O campo "Nome" precisa ser preenchido.',
            'nome.min' => 'O campo "Nome" precisa ter no mínimo 5 caracteres.',
            'nome.max' => 'O campo "Nome" pode ter no máximo 190 caracteres.',
            'email.required' => 'O campo "E-mail" precisa ser preenchido.',
            'email.max' => 'O campo "E-mail" pode ter no máximo 190 caracteres.',
            'email.email' => 'O campo "E-mail" precisa ser um e-mail válido.',
        ];
    }
}