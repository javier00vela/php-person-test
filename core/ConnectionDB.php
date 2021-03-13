<?php

namespace core;

class ConnectionDB 
{
    public $connection;   
    private static $dns = DB_DSN; 
    private static $user = DB_USER; 
    private static $pass = DB_PASSWORD;  
    private static $instance;
 
 
    /* Singleton Pattern */
    protected  function getInstance()
    { 
        if(!isset(self::$instance)) 
        { 
            $object = __CLASS__; 
            self::$instance =  new \Nette\Database\Connection(self::$dns,self::$user,self::$pass);   ; 
        } 
        return self::$instance; 
    }  
}
