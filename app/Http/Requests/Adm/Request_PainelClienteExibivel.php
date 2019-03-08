<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelClienteExibivel extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'cliente' => 'required',
            'sequencia' => 'required'
        ];
    }
}