<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ControllerSite extends Controller
{
    public function link($link) {

        
        if ($link == 'whatsApp-01'){
            return redirect('https://api.whatsapp.com/send?1=pt_BR&phone=5566996029513');
        }
        
        if ($link == 'whatsApp-02'){
            return redirect('https://api.whatsapp.com/send?1=pt_BR&phone=5566984020566');
        }

        if ($link == 'teste-gratis'){
            return redirect('https://sys.nuctecnologia.com.br/cadastro');
        }

        else {
            return view('welcome');
        }
        
    }
}
