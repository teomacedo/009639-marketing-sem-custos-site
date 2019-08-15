<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class Painel extends Controller
{

    public function index()
    {   
        $site = explode('/', Request::url())[2] ;
        return view('adm.painel.index', compact('site'));
    }


}
