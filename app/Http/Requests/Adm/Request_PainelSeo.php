<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelSeo extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'meta_description' => 'required|max:160',
            'imagem' => 'required',
        ];
    }
}