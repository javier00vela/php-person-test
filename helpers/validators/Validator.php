<?php

namespace helpers\validator;

class Validator{

    public static function isMail($str)
    {
       return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches =null));
    }

}
