<?php
namespace controller;
use core\EntityManager;
use helpers\http\Http;
use models\user\UserValidator;
use models\person\PersonValidator;
use models\user\User;
use models\person\Person;
use helpers\customer\CustomerData;
use helpers\session\Session;
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

    public function login()
    {
        if (Http::method(POST)) {
            $this->loginPostValidation();
        }
        $this->view("login", [
            "errorsLogin" => $this->userValidator->validateFields($_POST, new User())->getErrors()
        ]);
    }

    public function register()
    {
        $sendBefore = false;
        if (Http::method(POST)) {
            $this->registerPostValidation();
            $sendBefore = true;
        }
        $this->view("register", [
            "countries" => CustomerData::requestData("countries"),
            "errorsRegister" => $this->personValidator->validateFields($_POST, $this->person)->getErrors(),
            "sended" =>  $sendBefore
        ]);
    }

    public function logout()
    {
        Session::logout();
        $this->redirect(LOGIN_PATH);
    }


    private function loginPostValidation()
    {

        $entityUserFields = $this->userValidator->mapperEntity($_POST, null);
        if ($this->entityManager->entity($this->user)->exist($entityUserFields) == 1) {
            Session::add("userAuth", ["Auth" => true]);
            if(isset($_SESSION["userAuth"])){
                $this->redirect(PANEL_PATH);
            }
        } else {
            $this->userValidator->addError("No se han encontrado usuarios con los datos agregados.");
        }
    }

    private function registerPostValidation()
    {
        $emailValidateExt =  CustomerData::requestData(EXIST_PERSON_REQUEST, $_POST["email"]);
        if (count($emailValidateExt) > 0) {
            $this->userValidator->addError($emailValidateExt);
        }
        
        $documentValidateExt =  CustomerData::requestData(EXIST_PERSON_REQUEST, $_POST["document"]);
        if (count($documentValidateExt) > 0) {
            $this->userValidator->addError($documentValidateExt);
        }

        if (count($this->personValidator->getErrors()) == 0) {
            if (count($this->userValidator->validateFields($_POST, $this->person)->getErrors()) == 0) {
                $personId  = $this->savePerson();
                if (!empty($this->saveUser($personId))) {
                    $this->redirect(LOGIN_PATH);
                }
            }
        }
    }

    private function savePerson()
    {
        $entityPersonFields = $this->personValidator->mapperEntity($_POST);
        return $this->entityManager->entity($this->person)->save($entityPersonFields);
    }

    private function saveUser(int $personId)
    {
        $entityUserFields = $this->userValidator->mapperEntity($_POST, $personId);
        return $this->entityManager->entity($this->user)->save($entityUserFields);
    }
}