<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\User;
/*editavel*/use App\Http\Requests\Adm\Request_PainelUsuario;
/*personalizado*/use App\Models\User_funcao;
/*personalizado*/use App\Models\User_funcao_rel;
/*personalizado*/use Illuminate\Support\Facades\Hash;

class PainelUsuario extends Controller {

    public $object;
    public $nomeClasse;
    public $diretorio;
    public $rota;
    public $imagem;
    public $tabelaColunas;
    public $createEditInclude;
    /*personalizado*/public $funcoes;

    public function __construct(User $model) {
        /*editavel*/$this->diretorio = '/adm/painel/usuario';
        /*editavel*/$this->tabelaColunas = ['Nome', 'e-mail', 'Função'];
        /*editavel*/$this->imagem = ['active' => 'yes','label' => 'Imagem'];
        /*editavel*/$this->createEditInclude = [['active' => 'yes','titulo' => 'Alterar Senha', 'path' => '_senha']];
        /*personalizado*/$this->funcoes = User_funcao::pluck('label', 'id');
        $this->object = $model;
        $nomeClasse = array_slice(explode("\\", get_class()), -1)[0];
        $this->nomeClasse = strtolower(substr($nomeClasse, 0, 1)) . substr($nomeClasse, 1, strlen($nomeClasse));
        $rotaArray = explode('/',$this->diretorio);
        $this->rota = $rotaArray[count($rotaArray)-1];
    }

    public function index() {
        $model = $this->object->all();
        $path = $this->nomeClasse;
        $diretorio = $this->diretorio;
        $tabelaColunas = $this->tabelaColunas;

        return view('adm.geral.list', compact('model', 'path', 'tabelaColunas', 'diretorio'
                
                ));
    }

    public function create() {
        /*editavel*/$titulo = 'Cadastro';
        /*personalizado*/$funcoes = $this->funcoes;
        $path = $this->nomeClasse;
        $diretorio = $this->diretorio;
        $imagem = $this->imagem;

        return view('adm.geral.create-edit', compact('path', 'diretorio', 'imagem', 'titulo',
                'funcoes'
                ));
    }

    public function store(Request_PainelUsuario $request) {
        $dataForm = $request->all();
        /*personalizado*/ $dataForm['password'] = Hash::make($dataForm['password']);
        
        $retorno = $this->object->create($dataForm);

        if ($retorno) {
            /*personalizado*/$funcaoUser['funcao_id'] = $dataForm['funcao'];
            /*personalizado*/$funcaoUser['user_id'] = $retorno->id;
            /*personalizado*/User_funcao_rel::insert($funcaoUser);
            return redirect()->route($this->rota.'.index');
        } else {
            return redirect()->back();
        }
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $model = $this->object->find($id);
        $path = $this->nomeClasse;
        $diretorio = $this->diretorio;
        $imagem = $this->imagem;
        $createEditInclude = $this->createEditInclude;

        /*editavel*/$titulo = 'Editar';
        /*personalizado*/$funcao = User_funcao_rel::where('user_id', $id)->first();
        /*personalizado*/$model ['funcao'] = $funcao->funcao_id;
        /*personalizado*/$funcoes = $this->funcoes;

        return view('adm.geral.create-edit', compact('model', 'path', 'createEditInclude', 'diretorio', 'imagem', 'titulo',
                'funcoes'
                ));
    }

    public function update(Request_PainelUsuario $request, $id) {
        $dataForm = $request->all();
        /*personalizado*/if(strlen($dataForm['password'])<= 30){$dataForm['password'] = Hash::make($dataForm['password']);}
        $model = $this->object->find($id);
        $retorno = $model->update($dataForm);

        if ($retorno) {
            /*personalizado*/User_funcao_rel::where('user_id', $id)->update(['funcao_id' => $dataForm['funcao']]);
            return redirect()->route($this->rota.'.index');
        } else {
            return redirect()->route($this->rota.'.create-edit')->with(['errors' => 'Falha ao editar']);
        }
    }

    public function destroy($id) {
        /*personalizado*/$funcaoUser = User_funcao_rel::where('user_id', $id)->first();
        /*personalizado*/User_funcao_rel::destroy($funcaoUser->id);
        $retorno = $this->object->destroy($id);
        if ($retorno) {
            return redirect()->route($this->rota.'.index');
        } else {
            return redirect()->route($this->rota.'.index')->with(['errors' => 'Falha ao deletar']);
        }
    }

}
