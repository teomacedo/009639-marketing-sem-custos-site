<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelFuncionalidade extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'sequencia' => 'required|numeric',
            'titulo' => 'required',
            'subtitulo' => 'required',
            'icons' => 'required'
        ];
    }
}