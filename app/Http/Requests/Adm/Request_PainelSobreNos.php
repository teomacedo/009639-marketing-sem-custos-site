<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelSobreNos extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'sequencia' => 'required|numeric'
        ];
    }

}
