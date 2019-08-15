<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailAssinatura extends Mailable {

    use Queueable,
        SerializesModels;

    public $dataForm;
    public $equipe;
    public $emailFrom;
    public $assunto;

    public function __construct($dataForm, $equipe, $emailFrom, $assunto) {
       $this->dataForm = $dataForm;
       $this->equipe = $equipe;
       $this->emailFrom = $emailFrom;
       $this->assunto = $assunto;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('emails.assinatura')->from($this->emailFrom)->subject($this->assunto);
    }

}
