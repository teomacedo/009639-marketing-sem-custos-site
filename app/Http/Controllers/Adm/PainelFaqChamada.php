<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\FaqChamada; //editavel
use App\Http\Requests\Adm\Request_PainelFaqChamada; //editavel

class PainelFaqChamada extends Controller {

    public $dadosBase;

    public function __construct(FaqChamada $model) {
        /* editavel */$this->dadosBase['diretorio'] = '/adm/painel/faq-chamada';
        /* editavel */$this->dadosBase['tabelaColunas'] = ['Título', 'Subtítulo', 'Botão'];
        /* editavel */$this->dadosBase['imagem'] = ['active' => 'no', 'label' => '---'];
        /* editavel */$this->dadosBase['createEditInclude'] = [['active' => 'no', 'titulo' => 'baza', 'path' => 'baza']];
        /* editavel */$this->dadosBase['crudFuncoes'] = ['show' => 'no', 'create' => 'no', 'edit' => 'yes', 'delete' => 'no'];
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

    public function store(Request_PainelFaqChamada $request) {
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
        $this->dadosBase['model'] = FaqChamada::find($id);
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

    public function update(Request_PainelFaqChamada $request, $id) {
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
