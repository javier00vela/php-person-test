<?php

namespace helpers\customer;

use \helpers\curl\Curl;

class CustomerData
{

    public static  function requestData(string $requestName, string|array $parameters = null)
    {
        switch ($requestName) {
            case COUNTRIES_REQUEST:
                return  CustomerData::getListCities();
            case LIST_PERSON_REQUEST:
                return  CustomerData::getListPerson();
            case FILTER_PERSON_REQUEST:
                return  CustomerData::getFilterPerson($parameters);
            case EXIST_PERSON_REQUEST:
                return  CustomerData::getExistPerson($parameters);
            default:
                return [];
        }
    }

    private static function getListCities()
    {
        return Curl::sendGet(COUNTRIES_LIST_EXTERNAL);
    }

    private static function getListPerson()
    {
        return Curl::sendGet(PERSON_LIST_EXTERNAL)->objects;
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
