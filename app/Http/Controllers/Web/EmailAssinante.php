<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\EmailAssinatura;
use App\Models\Assinante;
use App\Models\Empresa;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Web\Request_EmailAssinatura;

class EmailAssinante extends Controller {

    public function store(Request_EmailAssinatura $request) {
        $dataForm = $request->all();
        if(count(Assinante::where('email', $dataForm['email'])->get())>0){
            $mensagemErro = "Ops! Esse e-mail já foi cadastrado anteriormente.";
            return redirect()->back()->with('mensagemErro', $mensagemErro);
        }
        $retorno = Assinante::create($dataForm);
        if ($retorno) {
            $equipe = Empresa::first();
            $from = Email::first();
            $assunto = 'Bem-vindo';
            Mail::to($dataForm['email'])->send(new EmailAssinatura($dataForm, $equipe->nome, $from->email, $assunto));
            $mensagemSucesso = ":) Seu cadastro foi feito com sucesso! Seja muito bem-vindo!";
            return redirect()->back()->with('mensagemSucesso', $mensagemSucesso);
        } else {
            $mensagemErro = "Ops! Erro ao cadastrar.";
            return redirect()->back()->with('mensagemErro', $mensagemErro);
        }
    }

}
