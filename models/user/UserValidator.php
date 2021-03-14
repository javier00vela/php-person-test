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

}
