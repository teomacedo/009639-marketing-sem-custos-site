<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class Login extends Controller
{
    public function index(){
        if (isset(Auth::user()->email)){
            return redirect(route('painel'));
        } else {
            return view('adm.login.index');
        }
    }
    
    public function logar(Request $request){
        $user_data = array(
            'email'     =>  $request->get('email'),
            'password'     =>  $request->get('password'),
        );
        
        if(Auth::attempt($user_data)){
            return redirect(route('painel'));
        } else{
            return back()->with('error', 'O login informado é inválido');
        }
    }
    
    
   
    public function sair(){
        Auth::logout();
        return redirect(route('login'));
    }
}
