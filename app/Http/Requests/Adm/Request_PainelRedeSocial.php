<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelRedeSocial extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'sequencia' => 'required|numeric',
            'nome' => 'required|max:190',
            'icon' => 'required|max:190',
            'link' => 'required|max:190'
        ];
    }
}