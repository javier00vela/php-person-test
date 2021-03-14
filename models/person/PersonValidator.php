<?php

namespace models\person;

class PersonValidator extends \core\ValidatorManager
{

    public  function validateFields(array $formHttp, Object $entity)
    {
        return parent::validateFieldEntity($formHttp , (array)$entity->field);
    }

}
