<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\ArtigoCategoria;
use App\Http\Requests\Adm\Request_PainelArtigoCategoria; //editavel


class PainelArtigoCategoria extends Controller {

    public $dadosBase;

    public function __construct(ArtigoCategoria $model) {
        /* editavel */$this->dadosBase['diretorio'] = '/adm/painel/artigo-categoria';
        /* editavel */$this->dadosBase['tabelaColunas'] = ['Seq.', 'Nome'];
        /* editavel */$this->dadosBase['imagem'] = ['active' => 'yes', 'label' => 'Capa'];
        /* editavel */$this->dadosBase['createEditInclude'] = [['active' => 'no', 'titulo' => 'baza', 'path' => 'baza']];
        /* editavel */$this->dadosBase['crudFuncoes'] = ['show' => 'no','create' => 'yes','edit' => 'yes','delete' => 'yes'];
        $this->dadosBase['model'] = $model;
        $nomeClasse = array_slice(explode("\\", get_class()), -1)[0];
        $this->dadosBase['nomeClasse'] = strtolower(substr($nomeClasse, 0, 1)) . substr($nomeClasse, 1, strlen($nomeClasse));
        $rotaArray = explode('/', $this->dadosBase['diretorio']);
        $this->dadosBase['rota'] = $rotaArray[count($rotaArray) - 1];
    }

    public function index() {
        $this->dadosBase['model'] = $this->dadosBase['model']->orderBy('sequencia')->get();
        $dadosBase = $this->dadosBase;
        return view('adm.geral.list', compact('dadosBase'));
    }

    public function create() {
        $dadosBase = $this->dadosBase;
        /* editavel */$titulo = 'Cadastro';

        return view('adm.geral.create-edit', compact('dadosBase', 'titulo'
                ));
    }

    public function store(Request_PainelArtigoCategoria $request) {
        $dataForm = $request->all();
        $retorno = $this->dadosBase['model']->create($dataForm);

        if ($retorno) {
            return redirect()->route($this->dadosBase['rota'] . '.index');
        } else {
            return redirect()->back();
        }
    }

    public function show($id) {
        return "Página show: " . $id;
    }

    public function edit($id) {
        $this->dadosBase['model'] = ArtigoCategoria::find($id);
        $dadosBase = $this->dadosBase;
        /* editavel */$titulo = 'Editar';
        return view('adm.geral.create-edit', compact('dadosBase', 'titulo'
                
        ));
    }

    public function update(Request_PainelArtigoCategoria $request, $id) {
        $dataForm = $request->all();
        $model = $this->dadosBase['model']->find($id);
        $retorno = $model->update($dataForm);

        if ($retorno) {
            return redirect()->route($this->dadosBase['rota'] . '.index');
        } else {
            return redirect()->route($this->dadosBase['rota'] . '.create-edit')->with(['errors' => 'Falha ao editar']);
        }
    }

    public function destroy($id) {
        $retorno = $this->dadosBase['model']->destroy($id);
        if ($retorno) {
            return redirect()->route($this->dadosBase['rota'] . '.index');
        } else {
            return redirect()->route($this->dadosBase['rota'] . '.index')->with(['errors' => 'Falha ao deletar']);
        }
    }

}
