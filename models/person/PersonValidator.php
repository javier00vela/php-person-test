<?php

namespace models\person;

use \core\EntityManager;
use \core\ValidatorManager;
class PersonValidator extends ValidatorManager
{

    public function __construct(EntityManager $entityManager){
        parent::__construct($entityManager);
    }

    public  function validateFields(array $formHttp, Object $entity)
    {
        return parent::validateFieldEntity($formHttp , (array)$entity->field);
    }

    public function mapperEntity(array $dataPost){
        return [
            "job_title" => $dataPost["job_title"],
            "email" => $dataPost["email"],
            "first_name" => $dataPost["first_name"],
            "document" => $dataPost["document"],
            "phone_number" => $dataPost["phone_number"],
            "last_name" => $dataPost["last_name"],
            "country" => $dataPost["country"],
            "state" => $dataPost["state"],
            "city" => $dataPost["city"],
        ];
    }

}
