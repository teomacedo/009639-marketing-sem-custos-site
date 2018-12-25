<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelArtigo extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'imagem' => 'required',
            'titulo' => 'required|max:190',
            'subtitulo' => 'required',
            'categoria' => 'required',
            'pagina_url' => 'max:190',
            'pagina_titulo' => 'max:190'
        ];
    }

}
