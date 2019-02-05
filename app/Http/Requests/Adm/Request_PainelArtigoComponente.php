<?php

namespace App\Http\Requests\Adm;

use Illuminate\Foundation\Http\FormRequest;

class Request_PainelArtigoComponente extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'sequencia' => 'required|numeric',
            'atributo_alt' => 'max:190',
            'atributo_title' => 'max:190',
            'links_externos' => 'max:190'
        ];
    }

}
