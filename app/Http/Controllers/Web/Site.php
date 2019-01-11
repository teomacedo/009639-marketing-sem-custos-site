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
use App\Models\Recurso;
use App\Models\CaseItem;
use App\Models\Faq;
use App\Models\Seo;

set_time_limit(600);

class Site extends Controller {

    public $cabecaloRodape;

    function __construct() {
        $this->cabecaloRodape['empresa'] = Empresa::first();
        $this->cabecaloRodape['endereco'] = Endereco::orderBy('sequencia')->get();
        $this->cabecaloRodape['redesSociais'] = RedeSocial::orderBy('sequencia')->get();
        $this->cabecaloRodape['telefones'] = Telefone::orderBy('sequencia')->get();
        $this->cabecaloRodape['emails'] = Email::orderBy('sequencia')->get();
        $this->cabecaloRodape['slides'] = $this->conteudoSlide();
        $this->cabecaloRodape['seo'] = Seo::get();
        $this->injetarCategorias();
    }

    public function home() {
        $quadroCategoriaOculto = 'yes';

        $recuros = Recurso::orderBy('sequencia')->limit(3)->get();
        $cases = CaseItem::orderBy('sequencia')->get();
        $faqs = Faq::orderBy('sequencia')->limit(3)->get();
        $chamadaPrincipal = \App\Models\ChamadaPrincipal::first();
        $chamadaCliente = \App\Models\ClienteChamada::first();
        $chamadaRecurso = \App\Models\RecursoChamada::first();
        $chamadaCase = \App\Models\CaseChamada::first();
        $chamadaFaq = \App\Models\FaqChamada::first();
        $clientes = DB::connection('nucserver')->select('SELECT distinct clientes.codigo_estado, clientes.nome, clientes.url FROM clientes LEFT JOIN loja_pedidos ON clientes.codigo_cliente = loja_pedidos.codigo_cliente WHERE loja_pedidos.codigo_pedido_status = 8  and loja_pedidos.updated_at BETWEEN CURDATE() - INTERVAL 15 DAY AND CURDATE() order by clientes.codigo_estado');
        $estados = DB::connection('nucserver')->select('SELECT distinct codigo_estado FROM clientes LEFT JOIN loja_pedidos ON clientes.codigo_cliente = loja_pedidos.codigo_cliente WHERE loja_pedidos.codigo_pedido_status = 8  and loja_pedidos.updated_at BETWEEN CURDATE() - INTERVAL 15 DAY AND CURDATE()');
        $estadosLista = Estado::get();
        return view('web.home.index', compact('quadroCategoriaOculto', 'recuros', 'cases', 'faqs', 'chamadaPrincipal', 'chamadaCliente', 'chamadaRecurso', 'chamadaCase', 'chamadaFaq', 'clientes', 'estados', 'estadosLista'))->with($this->cabecaloRodape);
    }

    public function blog() {
        $artigos = Artigo::orderBy('updated_at', 'desc')->get();
        $tituloAba = 'Blog';
        return view('web.blog.index', compact('artigos', 'tituloAba'))->with($this->cabecaloRodape);
    }

    public function categoria($url = null) {
        $categoria = ArtigoCategoria::where('pagina_url', $url)->first();
        if (!isset($categoria->id)) {
            return redirect()->route('blog');
        } else {
            if ($categoria->thumbnail == '') {
                $categoria->thumbnail = $categoria->imagem;
            }
            $artigos = $categoria->artigos;
            $tituloAba = $categoria->pagina_titulo;
            return view('web.categoria.index', compact('categoria', 'artigos', 'tituloAba'))->with($this->cabecaloRodape);
        }
    }

    public function artigo($url = null) {
        $artigo = Artigo::where('pagina_url', $url)->first();
        if (!isset($artigo->id)) {
            return redirect()->route('blog');
        } else {
            if ($artigo->thumbnail == '') {
                $artigo->thumbnail = $artigo->imagem;
            }
            $conteudo = ArtigoComponente::orderBy('sequencia')->where('artigo_id', $artigo->id)->get();
            $banner = $this->cabecaloRodape['slides'][rand(0, count($this->cabecaloRodape['slides']) - 1)];
            $tituloAba = $artigo->pagina_titulo;
            return view('web.artigo.index', compact('artigo', 'conteudo', 'banner', 'tituloAba'))->with($this->cabecaloRodape);
        }
    }

    public function sobreNos() {
        $conteudo = SobreNos::orderBy('sequencia')->get();
        $tituloAba = 'Sobre nós';
        return view('web.sobre-nos.index', compact('conteudo', 'tituloAba'))->with($this->cabecaloRodape);
    }

    public function faleConosco() {
        $tituloAba = 'Fale conosco';
        return view('web.fale-conosco.index', compact('tituloAba'))->with($this->cabecaloRodape);
    }

    public function recursos() {
        $quadroCategoriaOculto = 'none';
        $recuros = Recurso::orderBy('sequencia')->get();
        $chamadaRecurso = \App\Models\RecursoChamada::first();
        $tituloAba = 'Recursos';
        $botao = ['botao_link' => '/home', 'botao_texto' => 'VOLTAR'];

        return view('web.recursos.index', compact('quadroCategoriaOculto', 'recuros', 'chamadaRecurso', 'tituloAba', 'botao'))->with($this->cabecaloRodape);
    }

    public function faqs() {
        $quadroCategoriaOculto = 'none';
        $faqs = Faq::orderBy('sequencia')->get();
        $chamadaFaq = \App\Models\FaqChamada::first();
        $tituloAba = 'Faqs';
        $botao = ['botao_link' => '/home', 'botao_texto' => 'VOLTAR'];

        return view('web.faqs.index', compact('quadroCategoriaOculto', 'faqs', 'chamadaFaq', 'tituloAba', 'botao'))->with($this->cabecaloRodape);
    }

    public function faqItem($url = null) {
        $faqs = Faq::where('pagina_url', $url)->get();
        if (!isset($faqs[0]['id'])) {
            return redirect()->route('home');
        } else {
            $chamadaFaq = \App\Models\FaqChamada::first();
            $tituloAba = $faqs[0]['pagina_titulo'];
            $exibirTituloSubtitulo = 'no';
            $botao = ['botao_link' => '/faqs', 'botao_texto' => 'VOLTAR'];
            return view('web.faqs.item', compact('quadroCategoriaOculto', 'faqs', 'chamadaFaq', 'tituloAba', 'exibirTituloSubtitulo', 'botao'))->with($this->cabecaloRodape);
        }
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
