<?php

namespace helpers\customer;

use \helpers\curl\Curl;

class CustomerData
{

    public static  function requestData(string $requestName)
    {
        switch ($requestName) {
            case "cities":
                return  CustomerData::getListCities();
            case "persons":
                return  CustomerData::getListPerson();
            default:
                return [];
        }
    }

    private static function getListCities()
    {
        return Curl::sendGet(DIR_URL . "/src/json/countries.json");
    }

    private static function getListPerson()
    {
        return Curl::sendGet("http://www.mocky.io/v2/5d9f39263000005d005246ae?mocky-delay=10s");
    }
}
