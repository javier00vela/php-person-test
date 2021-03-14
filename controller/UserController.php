<?php


use core\EntityManager;
use helpers\http\Http;
use models\user\UserValidator;
use models\person\PersonValidator;
use models\user\User;
use models\person\Person;
class UserController extends \core\ControllerBase
{

    private EntityManager $entityManager;
    private User $user;
    private UserValidator $userValidator;
    private Person $person;
    private PersonValidator $personValidator;

    public function __construct()
    {
        parent::__construct();
        $this->entityManager = new EntityManager();
        $this->userValidator = new UserValidator();
        $this->user = new User();
        $this->person = new Person();
    }


    public function login()
    {
        $this->view("login", [
            "errorsLogin" => $this->userValidator->validateFields($_POST,new User())->getErrors()
        ]);
    }

    public function register()
    {
        if (Http::method(POST)) {
           if(count($this->userValidator->validateFields($_POST,new User())->getErrors()) == 0){
               
                $this->redirect("/user/login");
           }
           
        }
        $this->view("register", [
            "countries" => \helpers\customer\CustomerData::requestData("cities"),
            "errorsRegister" => $this->userValidator->validateFields($_POST,new User())->getErrors()
        ]);
    }
}
