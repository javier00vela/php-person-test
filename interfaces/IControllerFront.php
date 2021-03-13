<?php

namespace interfaces;
interface IControllerFront{

    public static function loadController($controller);

    public static function dispatchAction($controller);

}


?>