<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelEmpresa extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'imagem' => 'required',
            'icon' => 'required',
            'nome' => 'required',
            'whatsapp' => 'required'
        ];
    }

}
