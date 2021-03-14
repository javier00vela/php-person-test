<?php
//FUNCIONES PARA EL CONTROLADOR FRONTAL
namespace core;

use Error;
use \interfaces\IControllerFront;

class ControllerFront implements IControllerFront {
    
    public static function loadController($controller){
        $controllerUpperFirt = ucwords($controller);
        $controller="{$controllerUpperFirt}Controller";
        $strController="controller/{$controller}.php";
        if(!is_file($strController)){
           throw new Error("El Controlador seleccionado no existe");
        }
        require_once $strController;
        $controller = "\\controller\\$controller";
        $controllerObject=new $controller();
        return $controllerObject;
    }
    
    private static function loadAction($controllerObject,$action){
        $accion = $action;
        $controllerObject->$accion();
    }
    
    public static function dispatchAction($controllerObject){
        if(isset($_GET["action"]) && method_exists($controllerObject, $_GET["action"])){
            self::loadAction($controllerObject, $_GET["action"]);
        }else{
            throw new Error("Esta acción no es valida");
        }
    }
}
