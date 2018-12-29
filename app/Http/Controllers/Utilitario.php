<?php

namespace App\Http\Controllers;

class Utilitario {

    static function string2url($cadeia) {
        $cadeia = trim($cadeia);
        $cadeia = strtr($cadeia, "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ", "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
        $cadeia = strtr($cadeia, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz");
        $cadeia = preg_replace('#([^.a-z0-9]+)#i', '-', $cadeia);
        $cadeia = preg_replace('#-{2,}#', '-', $cadeia);
        $cadeia = preg_replace('#-$#', '', $cadeia);
        $cadeia = preg_replace('#^-#', '', $cadeia);
        return substr($cadeia, 0, 189);
    }

}
