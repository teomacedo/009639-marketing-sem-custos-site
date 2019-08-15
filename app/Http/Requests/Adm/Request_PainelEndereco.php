<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelEndereco extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'sequencia' => 'required|numeric',
            'estado' => 'required|max:2',
            'cidade' => 'required|max:190',
            'bairro' => 'required|max:190',
            'endereco' => 'required|max:190',
            'numero' => 'required|max:50',
            'cep' => 'max:10',
        ];
    }
}