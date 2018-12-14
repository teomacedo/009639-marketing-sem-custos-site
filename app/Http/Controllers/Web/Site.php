<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Endereco;
use App\Models\RedeSocial;
use App\Models\Telefone;
use App\Models\Email;
use App\Models\ArtigoCategoria;
use App\Models\Artigo;
use App\Models\ArtigoComponente;
use App\Models\SobreNos;

class Site extends Controller {

    public $cabecaloRodape;

    function __construct() {
        $this->cabecaloRodape['empresa'] = Empresa::first();
        $this->cabecaloRodape['endereco'] = Endereco::orderBy('sequencia')->get();
        $this->cabecaloRodape['categorias'] = ArtigoCategoria::orderBy('sequencia')->get();
        $this->cabecaloRodape['redesSociais'] = RedeSocial::orderBy('sequencia')->get();
        $this->cabecaloRodape['telefones'] = Telefone::orderBy('sequencia')->get();
        $this->cabecaloRodape['emails'] = Email::orderBy('sequencia')->get();
    }

    public function blog() {
        $artigos = Artigo::orderBy('updated_at', 'desc')->get();
        return view('web.home.index', compact('artigos'))->with($this->cabecaloRodape);
    }

    public function categoria($id = null) {
        if ($id == null) {
            return redirect()->route('blog');
        } else {
            $categoria = ArtigoCategoria::find($id);
            $artigos = $categoria->artigos;
            //$artigos = Artigo::orderBy('updated_at', 'desc')->get();
            return view('web.categoria.index', compact('categoria', 'artigos'))->with($this->cabecaloRodape);
        }
    }

    public function artigo($id = null) {
        if ($id == null) {
            return redirect()->route('blog');
        } else {
            $artigo = Artigo::find($id);
            $conteudo = $this->conteudoComposto(ArtigoComponente::orderBy('sequencia')->where('artigo_id', $id)->get(), 'trecho');
            return view('web.artigo.index', compact('artigo', 'conteudo'))->with($this->cabecaloRodape);
        }
    }

    public function sobreNos() {
        $conteudo = $this->conteudoComposto(SobreNos::orderBy('sequencia')->get(), 'trecho');
        return view('web.sobre-nos.index', compact('conteudo'))->with($this->cabecaloRodape);
    }
    
    public function faleConosco() {
        return view('web.fale-conosco.index')->with($this->cabecaloRodape);
    }

    public function conteudoComposto($objeto, $conteudo) {
        for ($i = 0; $i < count($objeto); $i++) {
            if (($i % 2) != 0) {
                $objeto[$i]['order'] = 'order: -1;';
                if($objeto[$i][$conteudo] != ''){
                    $objeto[$i]['padding'] = 'padding-right: 55px; padding-left: 0px;';
                } else {
                    $objeto[$i]['padding'] = 'padding-right: 0px; padding-left: 0px;';
                }
                
            }
            
            if ($objeto[$i]['imagem_altura'] == ''){
                $objeto[$i]['img_altura'] = 'height: 400px;';
            } else{
                $objeto[$i]['img_altura'] = 'height: '.$objeto[$i]['imagem_altura'].'px;';
            }
            if ($objeto[$i]['imagem'] == '') {
                $objeto[$i]['noimg'] = 'min-width: 100%; padding: 0px;';
            }
            
            if (($objeto[$i]['titulo'] == '') && ($objeto[$i]['subtitulo'] == '')) {
                if ($objeto[$i][$conteudo] == '') {
                    $objeto[$i]['onlyimg'] = 'min-width: 100%;';
                }
            }
            
            $objeto[$i]['conteudo'] = $objeto[$i][$conteudo];
        }
        return $objeto;
    }

}
