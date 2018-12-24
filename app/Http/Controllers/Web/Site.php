<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;
use App\Models\Endereco;
use App\Models\RedeSocial;
use App\Models\Telefone;
use App\Models\Email;
use App\Models\ArtigoCategoria;
use App\Models\Artigo;
use App\Models\ArtigoComponente;
use App\Models\SobreNos;
use App\Models\Slide;
use App\Models\Estado;

class Site extends Controller {

    public $cabecaloRodape;

    function __construct() {
        $this->cabecaloRodape['empresa'] = Empresa::first();
        $this->cabecaloRodape['endereco'] = Endereco::orderBy('sequencia')->get();
        $this->cabecaloRodape['redesSociais'] = RedeSocial::orderBy('sequencia')->get();
        $this->cabecaloRodape['telefones'] = Telefone::orderBy('sequencia')->get();
        $this->cabecaloRodape['emails'] = Email::orderBy('sequencia')->get();
        $this->cabecaloRodape['slides'] = $this->conteudoSlide();
        $this->injetarCategorias();
    }

    public function home() {
        $quadroCategoriaOculto = 'none';
        $clientes = DB::connection('nucserver')->select('SELECT distinct clientes.codigo_estado, clientes.nome, clientes.url FROM clientes LEFT JOIN loja_pedidos ON clientes.codigo_cliente = loja_pedidos.codigo_cliente WHERE loja_pedidos.codigo_pedido_status = 8  and loja_pedidos.updated_at BETWEEN CURDATE() - INTERVAL 15 DAY AND CURDATE() order by clientes.codigo_estado');
        $estados = DB::connection('nucserver')->select('SELECT distinct codigo_estado FROM clientes LEFT JOIN loja_pedidos ON clientes.codigo_cliente = loja_pedidos.codigo_cliente WHERE loja_pedidos.codigo_pedido_status = 8  and loja_pedidos.updated_at BETWEEN CURDATE() - INTERVAL 15 DAY AND CURDATE()');
        $estadosLista = Estado::get();
        return view('web.home.index', compact('quadroCategoriaOculto', 'clientes', 'estados', 'estadosLista' ))->with($this->cabecaloRodape);
    }

    public function blog() {
        $artigos = Artigo::orderBy('updated_at', 'desc')->get();



        return view('web.blog.index', compact('artigos'))->with($this->cabecaloRodape);
    }

    public function categoria($id = null) {
        if ($id == null) {
            return redirect()->route('blog');
        } else {
            $categoria = ArtigoCategoria::find($id);
            if ($categoria->thumbnail == '') {
                $categoria->thumbnail = $categoria->imagem;
            }
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
            if ($artigo->thumbnail == '') {
                $artigo->thumbnail = $artigo->imagem;
            }
            $conteudo = $this->conteudoComposto(ArtigoComponente::orderBy('sequencia')->where('artigo_id', $id)->get(), 'trecho');
            $banner = $this->cabecaloRodape['slides'][rand(0, count($this->cabecaloRodape['slides']) - 1)];
            //$banner = ;
            return view('web.artigo.index', compact('artigo', 'conteudo', 'banner'))->with($this->cabecaloRodape);
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
                if ($objeto[$i][$conteudo] != '') {
                    $objeto[$i]['padding'] = 'padding-right: 15px; padding-left: 0px;';
                } else {
                    $objeto[$i]['padding'] = 'padding-right: 0px; padding-left: 0px;';
                }
            }

            if ($objeto[$i]['img_altura'] != $objeto[$i]['imagem_altura_mobile']) {
                $objeto[$i]['imagem_altura_mobile'] = "<style type='text/css'>@media (max-width: 992px) {.conteudo-composto-foto-altura-small-" . $i . "{height: " . $objeto[$i]['imagem_altura_mobile'] . "px !important;}}</style>";
            }

            $objeto[$i]['class_img_altura_smal'] = 'conteudo-composto-foto-altura-small-' . $i;
            $objeto[$i]['img_altura'] = 'height: ' . $objeto[$i]['imagem_altura'] . 'px;';

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

    public function conteudoSlide() {
        $slides = Slide::orderBy('sequencia')->get();
        for ($i = 0; $i < count($slides); $i++) {
            if ($i == 0) {
                $slides[$i]['active'] = 'active';
            }
            if ($slides[$i]['imagem_small'] == '') {
                $slides[$i]['imagem_small'] = $slides[$i]['imagem'];
            }
            if ($slides[$i]['titulo_small'] == '') {
                $slides[$i]['titulo_small'] = $slides[$i]['titulo_desktop'];
            }
            if ($slides[$i]['subtitulo_small'] == '') {
                $slides[$i]['subtitulo_small'] = $slides[$i]['subtitulo_desktop'];
            }
        }

        return $slides;
    }

    public function injetarCategorias() {
        $this->cabecaloRodape['categorias'] = ArtigoCategoria::orderBy('sequencia')->get();
        $i = 0;
        foreach ($this->cabecaloRodape['categorias'] as $categoria) {
            if ($i == 0) {
                if (count($categoria->artigos) > 0) {
                    $categoria->active = 'active';
                    $i++;
                }
            }
            if ($categoria->thumbnail == '') {
                $categoria->thumbnail = $categoria->imagem;
            }
        }
    }

}
