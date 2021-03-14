<?php

namespace helpers\customer;

use \helpers\curl\Curl;
class CustomerData
{

    public static  function requestData (string $requestName){
        switch($requestName){
            case "cities":
                return  CustomerData::getListCities();
        }
    }

    private static function getListCities(){
        // echo DIR_URL."/src/json/country.json";
       return Curl::sendGet(DIR_URL."/src/json/countries.json");
    }

}

?>