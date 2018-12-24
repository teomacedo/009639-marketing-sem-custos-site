<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelFaqItem extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'sequencia' => 'required|numeric',
            'questao' => 'required',
            'resposta' => 'required'
        ];
    }

}