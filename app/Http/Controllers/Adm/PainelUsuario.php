<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\User;
/* editavel */use App\Http\Requests\Adm\Request_PainelUsuario;
/* personalizado */use App\Models\User_funcao;
/* personalizado */use App\Models\User_funcao_rel;
/* personalizado */use Illuminate\Support\Facades\Hash;

class PainelUsuario extends Controller {

    public $dadosBase;
    /* personalizado */public $funcoes;

    public function __construct(User $model) {
        /* editavel */$this->dadosBase['diretorio'] = '/adm/painel/usuario';
        /* editavel */$this->dadosBase['tabelaColunas'] = ['Nome', 'e-mail', 'Função'];
        /* editavel */$this->dadosBase['imagem'] = ['active' => 'yes', 'label' => 'Imagem'];
        /* editavel */$this->dadosBase['createEditInclude'] = [['active' => 'yes', 'titulo' => 'Alterar Senha', 'path' => '_senha']];
        /* editavel */$this->dadosBase['crudFuncoes'] = ['show' => 'no','create' => 'yes','edit' => 'yes','delete' => 'yes'];
        /* personalizado */$this->funcoes = User_funcao::pluck('label', 'id');
        $this->dadosBase['model'] = $model;
        $nomeClasse = array_slice(explode("\\", get_class()), -1)[0];
        $this->dadosBase['nomeClasse'] = strtolower(substr($nomeClasse, 0, 1)) . substr($nomeClasse, 1, strlen($nomeClasse));
        $rotaArray = explode('/', $this->dadosBase['diretorio']);
        $this->dadosBase['rota'] = $rotaArray[count($rotaArray) - 1];
    }

    public function index() {
        $this->dadosBase['model'] = $this->dadosBase['model']->all();
        $dadosBase = $this->dadosBase;
        return view('adm.geral.list', compact('dadosBase'));
    }

    public function create() {
        /* editavel */$this->dadosBase['createEditInclude'][0]['active'] = 'no';
        $dadosBase = $this->dadosBase;
        /* editavel */$titulo = 'Cadastro';
        /* personalizado */$funcoes = $this->funcoes;
        

        return view('adm.geral.create-edit', compact('dadosBase', 'titulo',
                'funcoes'
        ));
    }

    public function store(Request_PainelUsuario $request) {
        $dataForm = $request->all();
        /* personalizado */ $dataForm['password'] = Hash::make($dataForm['password']);

        $retorno = $this->dadosBase['model']->create($dataForm);

        if ($retorno) {
            /* personalizado */$funcaoUser['funcao_id'] = $dataForm['funcao'];
            /* personalizado */$funcaoUser['user_id'] = $retorno->id;
            /* personalizado */User_funcao_rel::insert($funcaoUser);
            return redirect()->route($this->dadosBase['rota'] . '.index');
        } else {
            return redirect()->back();
        }
    }

    public function show($id) {
        return "Página show: " . $id;
    }

    public function edit($id) {
        $this->dadosBase['model'] = User::find($id);
        $dadosBase = $this->dadosBase;

        /* editavel */$titulo = 'Editar';
        /* personalizado */$funcao = User_funcao_rel::where('user_id', $id)->first();
        /* personalizado */$this->dadosBase['model']['funcao'] = $funcao->funcao_id;
        /* personalizado */$funcoes = $this->funcoes;

        return view('adm.geral.create-edit', compact('dadosBase', 'titulo', 'funcoes'
        ));
    }

    public function update(Request_PainelUsuario $request, $id) {
        $dataForm = $request->all();
        /* personalizado */if (strlen($dataForm['password']) <= 30) {
            $dataForm['password'] = Hash::make($dataForm['password']);
        }
        $model = $this->dadosBase['model']->find($id);
        $retorno = $model->update($dataForm);

        if ($retorno) {
            /* personalizado */User_funcao_rel::where('user_id', $id)->update(['funcao_id' => $dataForm['funcao']]);
            return redirect()->route($this->dadosBase['rota'] . '.index');
        } else {
            return redirect()->route($this->dadosBase['rota'] . '.create-edit')->with(['errors' => 'Falha ao editar']);
        }
    }

    public function destroy($id) {
        /* personalizado */$funcaoUser = User_funcao_rel::where('user_id', $id)->first();
        /* personalizado */User_funcao_rel::destroy($funcaoUser->id);
        $retorno = $this->dadosBase['model']->destroy($id);
        if ($retorno) {
            return redirect()->route($this->dadosBase['rota'] . '.index');
        } else {
            return redirect()->route($this->dadosBase['rota'] . '.index')->with(['errors' => 'Falha ao deletar']);
        }
    }

}
