<?php

namespace helpers\customer;

use \helpers\curl\Curl;

class CustomerData
{

    public static  function requestData(string $requestName, string|array $parameters = null)
    {
        switch ($requestName) {
            case "countries":
                return  CustomerData::getListCities();
            case "persons":
                return  CustomerData::getListPerson();
            case "persons_filter":
                return  CustomerData::getFilterPerson($parameters);
            case "persons_exist":
                return  CustomerData::getExistPerson($parameters);
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
        return Curl::sendGet("http://www.mocky.io/v2/5d9f39263000005d005246ae")->objects;
    }

    private static function getExistPerson(string $valueParama)
    {
        $responseError = [];
        $array = CustomerData::getListPerson();
        foreach ($array as $key => $value) {
            if ($valueParama == $value->email) {
                $responseError = ["message" => "el campo Correo debe ser uníco."];
            }
            if ($valueParama == $value->document) {
                $responseError = ["message" => "el campo Documento debe ser uníco."];
            }
        }
        return $responseError;
    }

    public static function getPersonByMail(string $mail)
    {
        $listFilterPerson = null;
        $array = CustomerData::getListPerson();
        foreach ($array as $key => $value) {
            if ($mail == $value->email) {
                $listFilterPerson = $value;
            }
        }
        return  $listFilterPerson;
    }

    private static function getFilterPerson(string $valueParama)
    {

        $listFilterPerson = [];
        $array = CustomerData::getListPerson();
        foreach ($array as $key => $value) {
            if ($valueParama == $value->email || $valueParama == $value->first_name || $valueParama == $value->last_name) {
                $listFilterPerson[] = $value;
            }
        }
        return  $listFilterPerson;
    }
}
