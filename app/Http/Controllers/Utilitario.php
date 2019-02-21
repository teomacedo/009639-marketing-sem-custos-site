<?php

namespace App\Http\Controllers;
use App\Models\Artigo;

class Utilitario {

    static function string2url($cadeia, $tamanho = 189) {
        $cadeia = trim($cadeia);
        $cadeia = strtr($cadeia, "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ", "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
        $cadeia = strtr($cadeia, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz");
        $cadeia = preg_replace('#([^.a-z0-9]+)#i', '-', $cadeia);
        $cadeia = preg_replace('#-{2,}#', '-', $cadeia);
        $cadeia = preg_replace('#-$#', '', $cadeia);
        $cadeia = preg_replace('#^-#', '', $cadeia);
        return substr($cadeia, 0, $tamanho);
    }
    
    static function string2title($cadeia, $tamanho = 189) {
        $retorno = str_replace(',', '', $cadeia);
        return substr($retorno, 0, $tamanho);
    }
    
    static function linksExternos($ids){
        $id = explode(';', $ids);
        $reotorno = "";
        foreach($id as $item){
            $artigo = Artigo::find($item);
            $reotorno = $reotorno . "<a class='link-externo' href='".  $artigo->pagina_url ."' target='_blank'><i class='far fa-check-circle'></i> " . $artigo->titulo . "</a><br>";
        }
        return $reotorno;
    }
    
   


}
