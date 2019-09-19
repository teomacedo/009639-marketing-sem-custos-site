<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ControllerSite extends Controller
{
    public function home() {
        return redirect('https://nuctecnologia.com.br/blog');
    }

    public function link($link) {

        
        if ($link == 'whatsApp'){
            return redirect('https://api.whatsapp.com/send?1=pt_BR&phone=5566997219347');
        }
        
        if ($link == 'menuvem-cadastro'){
            return redirect('https://sys.nuctecnologia.com.br/cadastro');
        }

        else {
            return redirect('https://nuctecnologia.com.br/blog');
        }
        
    }
}
