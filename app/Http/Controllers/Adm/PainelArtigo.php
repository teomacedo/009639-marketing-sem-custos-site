<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Artigo;
use App\Models\ArtigoCategoria; //personalizado
use App\Models\ArtigoConclusao; //personalizado
use App\Models\ArtigoCategoriaRelac; //personalizado
use App\Http\Requests\Adm\Request_PainelArtigo; //editavel
use App\Http\Controllers\Utilitario; //personalizado

class PainelArtigo extends Controller {

    public $dadosBase;
    /* personalizado 
    */public $categorias;
    /* personalizado 
    */public $conclusoes;

    public function __construct(Artigo $model) {
        /* editavel */$this->dadosBase['diretorio'] = '/adm/painel/artigo';
        /* editavel */$this->dadosBase['tabelaColunas'] = ['ID', 'Publicado', 'Titulo', 'Subtitulo', 'Categoria'];
        /* editavel */$this->dadosBase['imagem'] = ['active' => 'yes', 'label' => 'Capa'];
        /* editavel */$this->dadosBase['createEditInclude'] = [['active' => 'no', 'titulo' => 'baza', 'path' => 'baza']];
        /* editavel */$this->dadosBase['crudFuncoes'] = ['show' => 'yes', 'create' => 'yes', 'edit' => 'yes', 'delete' => 'yes'];
        $this->dadosBase['model'] = $model;
        $nomeClasse = array_slice(explode("\\", get_class()), -1)[0];
        $this->dadosBase['nomeClasse'] = strtolower(substr($nomeClasse, 0, 1)) . substr($nomeClasse, 1, strlen($nomeClasse));
        $rotaArray = explode('/', $this->dadosBase['diretorio']);
        $this->dadosBase['rota'] = $rotaArray[count($rotaArray) - 1];

        /* personalizado */$this->categorias = ArtigoCategoria::pluck('nome', 'id');
        /* personalizado */$this->conclusoes = ArtigoConclusao::pluck('titulo', 'id');
    }

    public function index() {
        $this->dadosBase['model'] = $this->dadosBase['model']->orderBy('created_at', 'desc')->get();
        $dadosBase = $this->dadosBase;
        return view('adm.geral.list', compact('dadosBase'));
    }

    public function create() {
        $dadosBase = $this->dadosBase;
        /* editavel */$titulo = 'Cadastro';
        /* personalizado */$categorias = $this->categorias;
        /* personalizado */$conclusoes = $this->conclusoes;

        return view('adm.geral.create-edit', compact('dadosBase', 'titulo'
                        , 'categorias', 'conclusoes'
        ));
    }

    public function store(Request_PainelArtigo $request) {
        $dataForm = $request->all();

        if (isset($dataForm['publicado'])) {
            $dataForm['publicado'] = 1;
        } else {
            $dataForm['publicado'] = 0;
        }

        if ($dataForm['pagina_titulo'] == '') {
            $dataForm['pagina_titulo'] = $dataForm['titulo'];
        }

        $dataForm['pagina_titulo'] = Utilitario::string2title($dataForm['pagina_titulo'], 62);

        if ($dataForm['pagina_url'] == '') {
            $dataForm['pagina_url'] = Utilitario::string2url($dataForm['pagina_titulo'], 140);
        } else {
            $dataForm['pagina_url'] = Utilitario::string2url($dataForm['pagina_url'], 140);
        }

        $retorno = $this->dadosBase['model']->create($dataForm);

        if ($retorno) {
            /* personalizado */$CategoriaArtigo['categoria_id'] = $dataForm['categoria'];
            /* personalizado */$CategoriaArtigo['artigo_id'] = $retorno->id;
            /* personalizado */ArtigoCategoriaRelac::insert($CategoriaArtigo);
            return redirect()->route($this->dadosBase['rota'] . '.index');
        } else {
            return redirect()->back();
        }
    }

    public function show($id) {
        return Redirect('adm/painel/artigo-componente/' . $id);
    }

    public function edit($id) {
        $this->dadosBase['model'] = Artigo::find($id);
        $dadosBase = $this->dadosBase;
        /* editavel */$titulo = 'Editar';
        /* personalizado */$categoria = ArtigoCategoriaRelac::where('artigo_id', $id)->first();
        /* personalizado */$this->dadosBase['model']['categoria'] = $categoria->categoria_id;
        /* personalizado */$categorias = $this->categorias;
        /* personalizado */$conclusoes = $this->conclusoes;
        return view('adm.geral.create-edit', compact('dadosBase', 'titulo'
                        , 'categorias', 'conclusoes'
        ));
    }

    public function update(Request_PainelArtigo $request, $id) {
        $dataForm = $request->all();

        if (isset($dataForm['publicado'])) {
            $dataForm['publicado'] = 1;
        } else {
            $dataForm['publicado'] = 0;
        }


        if ($dataForm['pagina_titulo'] == '') {
            $dataForm['pagina_titulo'] = $dataForm['titulo'];
        }
        $dataForm['pagina_titulo'] = Utilitario::string2title($dataForm['pagina_titulo'], 62);

        if ($dataForm['pagina_url'] == '') {
            $dataForm['pagina_url'] = Utilitario::string2url($dataForm['pagina_titulo'], 140);
        } else {
            $dataForm['pagina_url'] = Utilitario::string2url($dataForm['pagina_url'], 140);
        }
        $model = $this->dadosBase['model']->find($id);
        $retorno = $model->update($dataForm);

        if ($retorno) {
            /* personalizado */ArtigoCategoriaRelac::where('artigo_id', $id)->update(['categoria_id' => $dataForm['categoria']]);
            return redirect()->route($this->dadosBase['rota'] . '.index');
        } else {
            return redirect()->route($this->dadosBase['rota'] . '.create-edit')->with(['errors' => 'Falha ao editar']);
        }
    }

    public function destroy($id) {
        /* personalizado */ArtigoCategoriaRelac::destroy('artigo_id', $id);
        $retorno = $this->dadosBase['model']->destroy($id);
        if ($retorno) {
            return redirect()->route($this->dadosBase['rota'] . '.index');
        } else {
            return redirect()->route($this->dadosBase['rota'] . '.index')->with(['errors' => 'Falha ao deletar']);
        }
    }

}
