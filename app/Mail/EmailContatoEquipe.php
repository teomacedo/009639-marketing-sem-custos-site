<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailContatoEquipe extends Mailable {

    use Queueable,
        SerializesModels;

    public $dataForm;
    public $equipe;
    public $emailFrom;


    public function __construct($dataForm, $equipe, $emailFrom) {
       $this->dataForm = $dataForm;
       $this->equipe = $equipe;
       $this->emailFrom = $emailFrom;
     }

    public function build() {
        return $this->view('emails.fale-conosco-equipe')->from($this->emailFrom)->subject('Solicitação de contato - '.$this->equipe);
    }

}
