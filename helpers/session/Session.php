<?php

namespace helpers\session;

class Session{

    public static function instance()
    {
        if(!empty(session_start())){
            session_start();
        }
    }

    public static function add(string $key , string|array|int $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function logout()
    {
        $_SESSION = array();
    }

    public static function destroy()
    { 
            session_destroy();
    }

}

?>