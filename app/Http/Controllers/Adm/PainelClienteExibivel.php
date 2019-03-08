<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ClienteExibivel; //editavel
use App\Http\Requests\Adm\Request_PainelClienteExibivel; //editavel

class PainelClienteExibivel extends Controller {

    public $dadosBase;
    // personalizado 
    public $clientesLista;

    public function __construct(ClienteExibivel $model) {
        /* editavel */$this->dadosBase['diretorio'] = '/adm/painel/cliente-exibivel';
        /* editavel */$this->dadosBase['tabelaColunas'] = ['Sequencia','Código', 'Nome'];
        /* editavel */$this->dadosBase['imagem'] = ['active' => 'no', 'label' => 'Imagem Para Microformatos'];
        /* editavel */$this->dadosBase['createEditInclude'] = [['active' => 'no', 'titulo' => 'baza', 'path' => 'baza']];
        /* editavel */$this->dadosBase['crudFuncoes'] = ['show' => 'no', 'create' => 'yes', 'edit' => 'yes', 'delete' => 'yes'];
        /* editavel */$this->dadosBase['foreign'] = 'no';
        $this->dadosBase['model'] = $model;
        $nomeClasse = array_slice(explode("\\", get_class()), -1)[0];
        $this->dadosBase['nomeClasse'] = strtolower(substr($nomeClasse, 0, 1)) . substr($nomeClasse, 1, strlen($nomeClasse));
        $rotaArray = explode('/', $this->dadosBase['diretorio']);
        $this->dadosBase['rota'] = $rotaArray[count($rotaArray) - 1];
        
        /* personalizado */
        $clientes = DB::connection('nucserver')->select('select nome, codigo_cliente from clientes');
        $i = 1;
        foreach($clientes as $item){
            $this->clientesLista[$i++] = $item->nome;
        }
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
                        ->with('clientesLista', $this->clientesLista)
                        ->with('foreign', $foreign);
    }

    public function create($foreign = '') {
        /* editavel */$titulo = 'Cadastro';
        
        /* personalizado */$clientesLista = $this->clientesLista;
        
        if ($foreign != '') {
            return view('adm.geral.create-edit', compact(''))
                            ->with('dadosBase', $this->dadosBase)
                            ->with('foreign', $foreign)
                            ->with('clientesLista', $clientesLista)
                            ->with('titulo', $titulo);
        } else {
            if ($this->dadosBase['foreign'] == 'no') {
                return view('adm.geral.create-edit', compact(''))
                                ->with('dadosBase', $this->dadosBase)
                                ->with('foreign', $foreign)
                                ->with('clientesLista', $clientesLista)
                                ->with('titulo', $titulo);
            } else {
                return redirect()->route('painel');
            }
        }
    }

    public function store(Request_PainelClienteExibivel $request) {
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
        $this->dadosBase['model'] = ClienteExibivel::find($id);
        /* editavel */$titulo = 'Editar';
        /* personalizado */$clientesLista = $this->clientesLista;
        if ($foreign != '') {
            return view('adm.geral.create-edit', compact(''))
                            ->with('dadosBase', $this->dadosBase)
                            ->with('foreign', $foreign)
                            ->with('clientesLista', $clientesLista)
                            ->with('titulo', $titulo);
        } else {
            if ($this->dadosBase['foreign'] == 'no') {
                return view('adm.geral.create-edit', compact(''))
                                ->with('dadosBase', $this->dadosBase)
                                ->with('clientesLista', $clientesLista)
                                ->with('titulo', $titulo);
            } else {
                return redirect()->route('painel');
            }
        }
    }

    public function update(Request_PainelClienteExibivel $request, $id) {
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
