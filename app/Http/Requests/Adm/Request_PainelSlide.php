<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelSlide extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'sequencia' => 'required|numeric',
            'nome' => 'required|max:190',
            'imagem' => 'required',
            'titulo_desktop' => 'required',
            'subtitulo_desktop' => 'required',
        ];
    }

}
