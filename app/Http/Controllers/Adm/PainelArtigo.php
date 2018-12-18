<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Artigo;
use App\Models\ArtigoCategoria; //personalizado
use App\Models\ArtigoCategoriaRelac; //personalizado
use App\Http\Requests\Adm\Request_PainelArtigo; //editavel


class PainelArtigo extends Controller {

    public $dadosBase;
    /* personalizado 
    */public $categorias;

    public function __construct(Artigo $model) {
        /* editavel */$this->dadosBase['diretorio'] = '/adm/painel/artigo';
        /* editavel */$this->dadosBase['tabelaColunas'] = ['Titulo', 'Subtitulo', 'Categoria'];
        /* editavel */$this->dadosBase['imagem'] = ['active' => 'yes', 'label' => 'Capa'];
        /* editavel */$this->dadosBase['createEditInclude'] = [['active' => 'no', 'titulo' => 'baza', 'path' => 'baza']];
        /* editavel */$this->dadosBase['crudFuncoes'] = ['show' => 'yes', 'create' => 'yes', 'edit' => 'yes', 'delete' => 'yes'];
        $this->dadosBase['model'] = $model;
        $nomeClasse = array_slice(explode("\\", get_class()), -1)[0];
        $this->dadosBase['nomeClasse'] = strtolower(substr($nomeClasse, 0, 1)) . substr($nomeClasse, 1, strlen($nomeClasse));
        $rotaArray = explode('/', $this->dadosBase['diretorio']);
        $this->dadosBase['rota'] = $rotaArray[count($rotaArray) - 1];

        /* personalizado */$this->categorias = ArtigoCategoria::pluck('nome', 'id');
    }

    public function index() {
        $this->dadosBase['model'] = $this->dadosBase['model']->orderBy('updated_at', 'desc')->get();
        $dadosBase = $this->dadosBase;
        return view('adm.geral.list', compact('dadosBase'));
    }

    public function create() {
        $dadosBase = $this->dadosBase;
        /* editavel */$titulo = 'Cadastro';
        /* personalizado */$categorias = $this->categorias;

        return view('adm.geral.create-edit', compact('dadosBase', 'titulo'
                        , 'categorias'
        ));
    }

    public function store(Request_PainelArtigo $request) {
        $dataForm = $request->all();
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
        return view('adm.geral.create-edit', compact('dadosBase', 'titulo'
                        , 'categorias'
        ));
    }

    public function update(Request_PainelArtigo $request, $id) {
        $dataForm = $request->all();
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