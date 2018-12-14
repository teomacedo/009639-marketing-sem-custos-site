<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailContatoUsuario extends Mailable {

    use Queueable,
        SerializesModels;

    public $dataForm;
    public $equipe;
    public $emailFrom;
    public $assunto;
    public $telefones;
    public $emails;

    public function __construct($dataForm, $equipe, $emailFrom, $assunto, $telefones, $emails) {
       $this->dataForm = $dataForm;
       $this->equipe = $equipe;
       $this->emailFrom = $emailFrom;
       $this->assunto = $assunto;
       $this->telefones = $telefones;
       $this->emails = $emails;

    }

    public function build() {
        return $this->view('emails.fale-conosco-usuario')->from($this->emailFrom)->subject($this->assunto);
    }

}
