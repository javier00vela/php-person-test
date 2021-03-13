<?php

namespace Core;

class Connection
{
    public $connection;   
    private static $dns = DB_DSN; 
    private static $user = DB_USER; 
    private static $pass = DB_PASSWORD;  
    private static $instance;
 
    public function __construct ()  
    {        
        try {
            $this->connection = new \PDO(self::$dns,self::$user,self::$pass,array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));   
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false); 
        } catch (\PDOException $e){
            echo $e->getMessage();
        }
       
    } 
 
    /* Singleton Pattern */
    public static function getInstance()
    { 
        if(!isset(self::$instance)) 
        { 
            $object = __CLASS__; 
            self::$instance = new $object; 
        } 
        return self::$instance; 
    }  
}
