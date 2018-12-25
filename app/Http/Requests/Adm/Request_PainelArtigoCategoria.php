<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelArtigoCategoria extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'sequencia' => 'required|numeric',
            'imagem' => 'required',
            'nome' => 'required|max:190',
            'subtitulo' => 'required',
            'pagina_url' => 'max:190',
            'pagina_titulo' => 'max:190'
        ];
    }

}
