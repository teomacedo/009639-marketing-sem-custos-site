<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\EmailContatoUsuario;
use App\Mail\EmailContatoEquipe;
use App\Models\Empresa;
use App\Models\Email;
use App\Models\Telefone;
use App\Models\FaleConosco;
use App\Models\Assinante;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Web\Request_EmailFaleConosco;

class EmailFaleConosco extends Controller {

    public function store(Request_EmailFaleConosco $request) {
        $dataForm = $request->all();
        $retorno = FaleConosco::create($dataForm);
        
        if (count(Assinante::where('email', $dataForm['email'])->get()) == 0) {
            Assinante::create($dataForm);
        }
        
        if ($retorno) {
            $equipe = Empresa::first();
            $from = Email::orderBy('sequencia')->first();
            $assunto = 'A Equipe Nuc já, já te retornará';
            $telefones = Telefone::orderBy('sequencia')->get();
            $emails = Email::orderBy('sequencia')->get();
            Mail::to($dataForm['email'])->send(new EmailContatoUsuario($dataForm, $equipe->nome, $from->email, $assunto, $telefones, $emails));
            Mail::to($from->email)->send(new EmailContatoEquipe($dataForm, $equipe->nome, $from->email));
            $mensagemSucesso = ":) Sua solicitação de conto foi enviada com sucesso! Retornaremos seu contato o mais breve possível!";
            return redirect()->back()->with('mensagemSucesso', $mensagemSucesso);
        } else {
            $mensagemErro = "Ops! Erro ao cadastrar.";
            return redirect()->back()->with('mensagemErro', $mensagemErro);
        }
    }



}
