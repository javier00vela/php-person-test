<?php 


use core\EntityManager;
use \models\person\Person;

class PersonController extends \core\ControllerBase{

    private $entityManager;

    public function __construct() {
        parent::__construct();
        $this->entityManager = new EntityManager();
    }

    public function index(){
        $data = $this->entityManager->entity(new Person())->findAll()->get();
        $this->view("login" , ["data" => $data]);
    }


}

?>