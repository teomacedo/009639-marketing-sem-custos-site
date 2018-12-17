<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Endereco; //editavel
use App\Http\Requests\Adm\Request_PainelEndereco; //editavel

class PainelEndereco extends Controller {

    public $dadosBase;
    /* personalizado */public $estadosUfs;

    public function __construct(Endereco $model) {
        /* editavel */$this->dadosBase['diretorio'] = '/adm/painel/endereco';
        /* editavel */$this->dadosBase['tabelaColunas'] = ['Seq.', 'Cidade', 'Bairro', 'Endereço'];
        /* editavel */$this->dadosBase['imagem'] = ['active' => 'no', 'label' => 'Logo'];
        /* editavel */$this->dadosBase['createEditInclude'] = [['active' => 'no', 'titulo' => 'baza', 'path' => 'baza']];
        /* editavel */$this->dadosBase['crudFuncoes'] = ['show' => 'no', 'create' => 'yes', 'edit' => 'yes', 'delete' => 'yes'];
        /* editavel */$this->dadosBase['foreign'] = 'no';
        $this->dadosBase['model'] = $model;
        $nomeClasse = array_slice(explode("\\", get_class()), -1)[0];
        $this->dadosBase['nomeClasse'] = strtolower(substr($nomeClasse, 0, 1)) . substr($nomeClasse, 1, strlen($nomeClasse));
        $rotaArray = explode('/', $this->dadosBase['diretorio']);
        $this->dadosBase['rota'] = $rotaArray[count($rotaArray) - 1];

        /* personalizado */$this->estadosUfs = [
            'AC' => 'Acre','AL' => 'Alagoas','AP' => 'Amapá','AM' => 'Amazonas','BA' => 'Bahia','CE' => 'Ceará','DF' => 'Distrito Federal','ES' => 'Espírito Santo','GO' => 'Goiás', 'MA' => 'Maranhão','MT' => 'Mato Grosso','MS' => 'Mato Grosso do Sul','MG' => 'Minas Gerais', 'PA' => 'Pará','PB' => 'Paraíba','PR' => 'Paraná','PE' => 'Pernambuco','PI' => 'Piauí', 'RJ' => 'Rio de Janeiro','RN' => 'Rio Grande do Norte','RS' => 'Rio Grande do Sul','RO' => 'Rondônia', 'RR' => 'Roraima','SC' => 'Santa Catarina','SP' => 'São Paulo','SE' => 'Sergipe','TO' => 'Tocantins'
        ];
    }

    public function index($foreign = '') {
        if ($foreign != '') {
            $this->dadosBase['model'] = $this->dadosBase['model']->all()->where('artigo_id', $foreign);
        } else {
            if ($this->dadosBase['foreign'] == 'no') {
                $this->dadosBase['model'] = $this->dadosBase['model']->orderBy('sequencia')->get();
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
                            ->with('titulo', $titulo)
                            /* personalizado */->with('estadosUfs', $this->estadosUfs);
        } else {
            if ($this->dadosBase['foreign'] == 'no') {
                return view('adm.geral.create-edit', compact(''))
                                ->with('dadosBase', $this->dadosBase)
                                ->with('foreign', $foreign)
                                ->with('titulo', $titulo)
                                /* personalizado */->with('estadosUfs', $this->estadosUfs);
            } else {
                return redirect()->route('painel');
            }
        }
    }

    public function store(Request_PainelEndereco $request) {
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
        $this->dadosBase['model'] = Endereco::find($id);
        /* editavel */$titulo = 'Editar';
        if ($foreign != '') {
            return view('adm.geral.create-edit', compact(''))
                            ->with('dadosBase', $this->dadosBase)
                            ->with('foreign', $foreign)
                            ->with('titulo', $titulo)
                            /* personalizado */->with('estadosUfs', $this->estadosUfs);
        } else {
            if ($this->dadosBase['foreign'] == 'no') {
                return view('adm.geral.create-edit', compact(''))
                                ->with('dadosBase', $this->dadosBase)
                                ->with('titulo', $titulo)
                                /* personalizado */->with('estadosUfs', $this->estadosUfs);
            } else {
                return redirect()->route('painel');
            }
        }
    }

    public function update(Request_PainelEndereco $request, $id) {
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
