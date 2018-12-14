<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\FaleConosco; //editavel
use App\Http\Requests\Adm\Request_PainelFaleConosco; //editavel

class PainelFaleConosco extends Controller {
    public $dadosBase;

    public function __construct(FaleConosco $model) {
        /* editavel */$this->dadosBase['diretorio'] = '/adm/painel/fale-conosco';
        /* editavel */$this->dadosBase['tabelaColunas'] = ['Data', 'Nome', 'Telefone', 'Status'];
        /* editavel */$this->dadosBase['imagem'] = ['active' => 'no', 'label' => 'Logo'];
        /* editavel */$this->dadosBase['createEditInclude'] = [['active' => 'no', 'titulo' => 'baza', 'path' => 'baza']];
        /* editavel */$this->dadosBase['crudFuncoes'] = ['show' => 'no', 'create' => 'yes', 'edit' => 'yes', 'delete' => 'yes'];
        /* editavel */$this->dadosBase['foreign'] = 'no';
        $this->dadosBase['model'] = $model;
        $nomeClasse = array_slice(explode("\\", get_class()), -1)[0];
        $this->dadosBase['nomeClasse'] = strtolower(substr($nomeClasse, 0, 1)) . substr($nomeClasse, 1, strlen($nomeClasse));
        $rotaArray = explode('/', $this->dadosBase['diretorio']);
        $this->dadosBase['rota'] = $rotaArray[count($rotaArray) - 1];
    }

    public function index($foreign = '') {
        if ($foreign != '') {
            $this->dadosBase['model'] = $this->dadosBase['model']->all()->where('artigo_id', $foreign);
        } else {
            if ($this->dadosBase['foreign'] == 'no') {
                $this->dadosBase['model'] = $this->dadosBase['model']->all();
            } else {
                return redirect()->route('painel');
            }
        }
        return view('adm.geral.list', compact(''))
                        ->with('dadosBase', $this->dadosBase)
                        ->with('foreign', $foreign);
    }

    public function create($foreign = '') {
        /* editavel */$titulo = 'Cadastro';

        if ($foreign != '') {
            return view('adm.geral.create-edit', compact(''))
                            ->with('dadosBase', $this->dadosBase)
                            ->with('foreign', $foreign)
                            ->with('titulo', $titulo);
        } else {
            if ($this->dadosBase['foreign'] == 'no') {
                return view('adm.geral.create-edit', compact(''))
                                ->with('dadosBase', $this->dadosBase)
                                ->with('foreign', $foreign)
                                ->with('titulo', $titulo);
            } else {
                return redirect()->route('painel');
            }
        }
    }

    public function store(Request_PainelFaleConosco $request) {
        $dataForm = $request->all();
        $retorno = $this->dadosBase['model']->create($dataForm);

        if ($retorno) {
            return Redirect($this->dadosBase['diretorio'] . '/' . $dataForm['foreign']);
        } else {
            return redirect()->back();
        }
    }

    public function show($id) {
        return 'Show id: ' . $id;
    }

    public function edit($id, $foreign = '') {
        $this->dadosBase['model'] = FaleConosco::find($id);
        /* editavel */$titulo = 'Editar';
        if ($foreign != '') {
            return view('adm.geral.create-edit', compact(''))
                            ->with('dadosBase', $this->dadosBase)
                            ->with('foreign', $foreign)
                            ->with('titulo', $titulo);
        } else {
            if ($this->dadosBase['foreign'] == 'no') {
                return view('adm.geral.create-edit', compact(''))
                                ->with('dadosBase', $this->dadosBase)
                                ->with('titulo', $titulo);
            } else {
                return redirect()->route('painel');
            }
        }
    }

    public function update(Request_PainelFaleConosco $request, $id) {
        $dataForm = $request->all();
        $model = $this->dadosBase['model']->find($id);
        $retorno = $model->update($dataForm);
        if ($retorno) {
            return Redirect($this->dadosBase['diretorio'] . '/' . $dataForm['foreign']);
        } else {
            return redirect()->route($this->dadosBase['rota'] . '.create-edit')->with(['errors' => 'Falha ao editar']);
        }
    }

    public function destroy($id, $foreign = '') {
        $retorno = $this->dadosBase['model']->destroy($id);
        if ($retorno) {
            return Redirect($this->dadosBase['diretorio'] . '/' . $foreign);
        } else {
            return redirect()->route($this->dadosBase['rota'] . '.index')->with(['errors' => 'Falha ao deletar']);
        }
    }

}
