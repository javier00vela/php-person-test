<?php
namespace controller;
use core\EntityManager;
use helpers\http\Http;
use models\person\Person;
use helpers\customer\CustomerData;
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
            $listPerson = $this->searchPostPerson();
        }
        if (Http::method(GET)) {
            $listPerson = $this->searchAllPerson();
        }
        $this->view("panel", [
            "listPerson" =>  $listPerson
        ]);
    }

    private function searchAllPerson(){
        $listPersonDb = $this->entityManager->entity($this->person)->findAll()->get();
        $listPersonExt = CustomerData::requestData(LIST_PERSON_REQUEST);
        return $listPersonDb + $listPersonExt;
    }

    private function searchPostPerson(){
        $listPersonDb = $this->entityManager->entity($this->person)->wheteOr([
            "email" => $_POST["_param"],
            "first_name" => $_POST["_param"],
            "last_name" => $_POST["_param"]
        ])->get();

        $listPersonExt = CustomerData::requestData(FILTER_PERSON_REQUEST, $_POST["_param"]);
        return $listPersonDb + $listPersonExt;
    }
}