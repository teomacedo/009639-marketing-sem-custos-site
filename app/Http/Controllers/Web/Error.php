<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Endereco;
use App\Models\RedeSocial;
use App\Models\Telefone;
use App\Models\Email;
use App\Models\Seo;

set_time_limit(600);

class Error extends Controller {

    public $cabecaloRodape;

    function __construct() {
        $this->cabecaloRodape['empresa'] = Empresa::first();
        $this->cabecaloRodape['endereco'] = Endereco::orderBy('sequencia')->get();
        $this->cabecaloRodape['redesSociais'] = RedeSocial::orderBy('sequencia')->get();
        $this->cabecaloRodape['telefones'] = Telefone::orderBy('sequencia')->get();
        $this->cabecaloRodape['emails'] = Email::orderBy('sequencia')->get();
        $this->cabecaloRodape['seo'] = Seo::get();
    }

    public function error404() {
        $tituloAba = "Página não encontrada";
        $quadroCategoriaOculto = 'yes';
        return view('web.errors.error404', compact('quadroCategoriaOculto', 'tituloAba'))->with($this->cabecaloRodape);
    }

}
