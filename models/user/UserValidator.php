<?php
namespace models\user;
use  \core\ValidatorManager;
class UserValidator extends ValidatorManager
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
            "password" =>  md5($dataPost["password"])
            ] :[
            "document" => $dataPost["document"],
            "password" => md5($dataPost["password"]),
            "person_id" => $personId,
        ];
    }

}

