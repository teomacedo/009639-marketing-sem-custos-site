<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelCaseItem extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'sequencia' => 'required|numeric',
            'imagem' => 'required|max:190',
            'titulo' => 'required',
            'nome_cliente' => 'required|max:190',
            'nome_loja' => 'required|max:190',
            'link_loja' => 'required|max:190',
            'link_artigo' => 'max:190',
            'video' => 'max:190'
        ];
    }

}
