<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\User;
//itens-editaveis
use App\Http\Requests\Adm\Request_PainelUsuario;
//--------

//_itens-personalizados
use App\Models\User_funcao;
use App\Models\User_funcao_rel;
use Illuminate\Support\Facades\Hash;
 //--------
class PainelUsuario extends Controller {

    private $object;
    public $nomeClasse;
    public $diretorio;
    public $rota;
    //_itens-personalizados
    public $funcoes;

    public function __construct(User $model) {
        //itens-editaveis
        $this->diretorio = '/adm/painel/usuario';
        //--------
        
        $this->object = $model;
        $nomeClasse = array_slice(explode("\\", get_class()), -1)[0];
        $this->nomeClasse = strtolower(substr($nomeClasse, 0, 1)) . substr($nomeClasse, 1, strlen($nomeClasse));
        $rotaArray = explode('/',$this->diretorio);
        $this->rota = $rotaArray[count($rotaArray)-1];

        
        //_itens-personalizados
        $this->funcoes = User_funcao::pluck('label', 'id');
    }

    public function index() {
        $model = $this->object->all();
        $path = $this->nomeClasse;
        $diretorio = $this->diretorio;
        //itens-editaveis
        $tabelaColunas = ['Nome', 'e-mail', 'Função'];
        //--------
        return view('adm.geral.list', compact('model', 'path', 'tabelaColunas', 'diretorio'));
    }

    public function create() {
        $path = $this->nomeClasse;
        $diretorio = $this->diretorio;

        //itens-editaveis
        //--------
        //_itens-personalizados
        $funcoes = $this->funcoes;
        //--------
        return view('adm.geral.create-edit', compact('path', 'funcoes', 'diretorio'));
    }

    public function store(Request_PainelUsuario $request) {
        $dataForm = $request->all();
        /*_itens-personalizados*/ $dataForm['password'] = Hash::make($dataForm['password']);
        
        $retorno = $this->object->create($dataForm);

        if ($retorno) {
            //_itens-personalizados
            $funcaoUser['funcao_id'] = $dataForm['funcao'];
            $funcaoUser['user_id'] = $retorno->id;
            User_funcao_rel::insert($funcaoUser);
            //--------
            return redirect()->route($this->rota.'.index');
        } else {
            return redirect()->back();
        }
    }

    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $model = $this->object->find($id);
        $path = $this->nomeClasse;
        $diretorio = $this->diretorio;


        //itens-editaveis
        $include = [
            ['titulo' => 'Alterar Senha', 'path' => '_senha']
        ];

        //_itens-personalizados
        $funcao = User_funcao_rel::where('user_id', $id)->first();
        $model ['funcao'] = $funcao->funcao_id;
        $funcoes = $this->funcoes;
        //--------
        return view('adm.geral.create-edit', compact('model', 'path', 'funcoes', 'include', 'diretorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request_PainelUsuario $request, $id) {
        $dataForm = $request->all();
        //_itens-personalizados
        if(strlen($dataForm['password'])<= 30){
        $dataForm['password'] = Hash::make($dataForm['password']);
        }
        //--------
        $model = $this->object->find($id);
        $retorno = $model->update($dataForm);

        if ($retorno) {
            //_itens-personalizados
            User_funcao_rel::where('user_id', $id)->update(['funcao_id' => $dataForm['funcao']]);
            //--------
            return redirect()->route($this->rota.'.index');
        } else {
            return redirect()->route($this->rota.'.create-edit')->with(['errors' => 'Falha ao editar']);
        }
    }

    public function destroy($id) {
        //_itens-personalizados
        $funcaoUser = User_funcao_rel::where('user_id', $id)->first();
        User_funcao_rel::destroy($funcaoUser->id);
        //--------

        $retorno = $this->object->destroy($id);
        if ($retorno) {
            return redirect()->route($this->rota.'.index');
        } else {
            return redirect()->route($this->rota.'.index')->with(['errors' => 'Falha ao deletar']);
        }
    }

}
