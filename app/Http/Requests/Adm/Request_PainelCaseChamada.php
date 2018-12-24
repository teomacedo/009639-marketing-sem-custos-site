<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelCaseChamada extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'titulo' => 'required',
            'subtitulo' => 'required',
            'botao_texto' => 'required|max:190',
            'botao_link' => 'required|max:190'
        ];
    }
}