<?php

namespace helpers\http;

class Http{

    public static function method($http)
    {
        return ($_SERVER['REQUEST_METHOD'] == $http) ? true : false;
    }

}

?>