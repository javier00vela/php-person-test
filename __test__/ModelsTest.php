<?php

require_once  "vendor/phpunit/phpunit/src/Framework/TestCase.php";
require_once  "config/Const.php";
require_once  "core/ConnectionDB.php";
require_once  "core/EntityManager.php";
require_once  "core/ValidatorManager.php";
require_once  "models/person/Person.php";
require_once  "models/user/User.php";
require_once  "models/user/UserValidator.php";

use models\person\Person;
use models\user\User;
use models\user\UserValidator;
use core\EntityManager;
use PHPUnit\Framework\TestCase;

final class ModelsTest extends TestCase
{

    /** Expect more than one row  from persons  */
    public function testGetListPerson()
    {
        $entityManager = new EntityManager();
        $person = new Person();
        $listPersons = $entityManager->entity($person)->findAll()->get();
        $this->assertGreaterThan(0 , count($listPersons) );
    }

    
    /** Expect  one error from User  Validator */
    public function testValidateOneErrorsUser()
    {
        $user = new User();
        $entityManager = new EntityManager();
        $userValidate = new UserValidator($entityManager->entity($user));
        $testDataSended = [
            "document" => "",
            "password" => ""
        ];
        $listError = $userValidate->validateFields($testDataSended, $user)->getErrors();
        $this->assertGreaterThan(0, count($listError) );
    }

        /** Expect  zero errors from User Validator 
         * 
         * - only validate if it don't have document and password to validate 
        */
        public function testValidateZeroAccessUser()
        {
            $user = new User();
            $entityManager = new EntityManager();
            $userValidate = new UserValidator($entityManager->entity($user));
            $testDataSended = [
                "document" => "hfgh",
                "password" => "hgfgh"
            ];
            $listError = $userValidate->validateFields($testDataSended, $user)->getErrors();
            $this->assertGreaterThan(0, count($listError) );
        }

}
