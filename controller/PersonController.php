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
        $listPerson = [];
        if (Http::method(POST)) {
            $listPersonDb = $this->entityManager->entity($this->person)->wheteOr([
                "email" => $_POST["_param"],
                "first_name" => $_POST["_param"],
                "last_name" => $_POST["_param"]
            ])->get();

            $listPersonExt = \helpers\customer\CustomerData::requestData("persons_filter", $_POST["_param"]);
            $listPerson = $listPersonDb + $listPersonExt;
        }
        if (Http::method(GET)) {
             $listPersonDb = $this->entityManager->entity($this->person)->findAll()->get();
             $listPersonExt = \helpers\customer\CustomerData::requestData("persons");
             $listPerson = $listPersonDb + $listPersonExt;
     
        }
        $this->view("panel", [
            "listPerson" =>  $listPerson
        ]);
    }
}
