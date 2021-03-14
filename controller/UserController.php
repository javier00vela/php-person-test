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
        parent::__construct(__CLASS__);
        $this->entityManager = new EntityManager();
        $this->user = new User();
        $this->person = new Person();
        $this->userValidator = new UserValidator($this->entityManager->entity($this->user));
        $this->personValidator = new PersonValidator($this->entityManager->entity($this->person));
    }


    public function logout(){
        $_SESSION = [];
        $this->redirect("/user/login");
    }


    public function login()
    {
        if (Http::method(POST)) {
            $entityUserFields = $this->userValidator->mapperEntity($_POST, null);
            if($this->entityManager->entity($this->user)->exist($entityUserFields) == 1){
                $_SESSION["userAuth"] = ["Auth" => true];
                $this->redirect("/person/panel");
            }else{
                $this->userValidator->errors[] = ["message"=> "El usuario agregado no existe"];
            }
        }
        $this->view("login", [
            "errorsLogin" => $this->userValidator->validateFields($_POST, new User())->getErrors()
        ]);
    }

    public function register()
    {
        if (Http::method(POST)) {
            if (count($this->userValidator->validateFields($_POST, new User())->getErrors()) == 0) {
                $personId  = $this->savePerson();
                if (!empty($this->saveUser($personId))) {
                    $this->redirect("/user/login");
                }
            }
        }
        $this->view("register", [
            "countries" => \helpers\customer\CustomerData::requestData("cities"),
            "errorsRegister" => $this->personValidator->validateFields($_POST, new Person())->getErrors()
        ]);
    }

    private function savePerson(){
        $entityPersonFields = $this->personValidator->mapperEntity($_POST);
        return $this->entityManager->entity($this->person)->save($entityPersonFields);
    }


    private function saveUser(int $personId){
        $entityUserFields = $this->userValidator->mapperEntity($_POST, $personId);
        return $this->entityManager->entity($this->user)->save($entityUserFields);
    }
}
