<?php

namespace models\user;

class UserValidator extends \core\ValidatorManager
{

    public  function validateFields( $formHttp,  $entity)
    {
        if(!empty($formHttp)){
            return parent::validateFieldEntity($formHttp ,(array) $entity->field);
        }
        return $this;
    }

    public function mapperEntity(array $dataPost , int|null $personId){
        return ($personId == null ) ?[
            "document" => $dataPost["document"],
            "password" => $dataPost["password"]
            ] :[
            "document" => $dataPost["document"],
            "password" => $dataPost["password"],
            "person_id" => $personId,
        ];
    }

}

