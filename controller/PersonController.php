<?php


use core\EntityManager;
use helpers\http\Http;
use models\person\PersonValidator;
use models\person\Person;

class PersonController extends \core\ControllerBase
{

    private EntityManager $entityManager;
    private Person $person;

    public function __construct()
    {
        parent::__construct(__CLASS__);
        $this->entityManager = new EntityManager();
        $this->person = new Person();
    }


    public function panel()
    {
        if (Http::method(POST)) {
            $listPerson = $this->entityManager->entity($this->person)->wheteOr([
                "email" => $_POST["_param"],
                "first_name" => $_POST["_param"],
                "last_name" => $_POST["_param"]
            ])->get();
        }
        if (Http::method(GET)) {
            $listPerson = $this->entityManager->entity($this->person)->findAll()->get();
        }
        $this->view("panel", [
            "listPerson" =>  $listPerson
        ]);
    }
}
