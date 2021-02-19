<?php

class Valida
{

    public static function validaNome($nome)
    {
        if (!preg_match_all('/^([áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+((\s[áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+)?$/', $nome)) {
            return true;
        } else {
            return false;
        }
    }
    public static function validaEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    public static function dataBr($data)
    {
        return Date('d/m/Y H:i', strtotime($data));
    }
}
