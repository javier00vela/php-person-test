<?php

require_once  "vendor/phpunit/phpunit/src/Framework/TestCase.php";
require_once  "helpers/curl/Curl.php";
require_once  "helpers/customer/CustomerData.php";
require_once  "config/Const.php";

use helpers\customer\CustomerData;
use PHPUnit\Framework\TestCase;

final class ResourcesExternalTest extends TestCase
{

    /** Response similar email tested before */
    public function testExistMailPersonData()
    {
        $emailExisted = "Sage_Ballard2801@cispeto.com";
        $this->assertEquals($emailExisted, CustomerData::getPersonByMail($emailExisted)->email);
    }


    /** Response keys propiety necessaries */
    public function testEstructurePersonData()
    {
        $listKeysGeneral = ["id","job_title","email","first_name","last_name","document","phone_number","country","state","city"];
        $listKeysGeneralReceived = [];
        $oneObjectPerson = CustomerData::requestData(LIST_PERSON_REQUEST)[0];
        foreach ($oneObjectPerson as $key => $value) {
            $listKeysGeneralReceived[] = $key;
        }
        $this->assertEquals($listKeysGeneral, $listKeysGeneralReceived );
    }

     /** Response almost one row */
     public function testNumberPersonData()
     {
         $oneObjectPerson = CustomerData::requestData(LIST_PERSON_REQUEST);
         $this->assertGreaterThan(0 , count($oneObjectPerson) );
     }


    /** Response keys propiety necessaries */
    public function testEstructureCountryData()
    {
        $listKeysGeneral = ["name","code"];
        $listKeysGeneralReceived = [];
        $oneObjectCountries = CustomerData::requestData(COUNTRIES_REQUEST)[0];
        foreach ($oneObjectCountries as $key => $value) {
            $listKeysGeneralReceived[] = $key;
        }
        $this->assertEquals($listKeysGeneral, $listKeysGeneralReceived );
    }

     /** Response almost one row */
     public function testNumberCountryData()
     {
         $oneObjectCountries = CustomerData::requestData(COUNTRIES_REQUEST);
         $this->assertGreaterThan(0 , count($oneObjectCountries) );
     }

  


}
