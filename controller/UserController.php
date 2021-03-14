<?php 


use core\EntityManager;

class UserController extends \core\ControllerBase{

    private $entityManager;

    public function __construct() {
        parent::__construct();
        $this->entityManager = new EntityManager();
    }


    public function auth(){
      
    }

    public function register(){
      
        $this->view("register",[
            "countries" => \helpers\customer\CustomerData::requestData("cities")
        ]);
    }


}

?>