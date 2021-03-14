<?php

namespace core;

class ValidatorManager
{
	protected $entityManager = null;
	public $errors = [];

	public function __construct(EntityManager $managerEntity)
	{
		$this->entityManager = $managerEntity;
	}

	public function getErrors()
	{
		return $this->errors;
	}

	public  function validateFieldEntity($formHttp,  $fields)
	{

		foreach ($fields as $valueField) {
			/* Required validation */
			if ($valueField["required"] && empty($formHttp[$valueField["name"]])) {
				$this->errors[] = ["message" => "El campo {$valueField['alias']} es requerido."];
			}
			if (isset($formHttp[$valueField["name"]])) {
				/* Min Length validation */
				if (strlen($formHttp[$valueField["name"]]) <  $valueField["min"]) {
					$this->errors[] = ["message" => "El campo {$valueField['alias']} debe contener minimo {$valueField['min']} caracteres."];
				}

				// /* Mail validation */
				if ($valueField["is_mail"] && !\helpers\validator\Validator::isMail($formHttp[$valueField["name"]])) {
					$this->errors[] = ["message" => "El campo {$valueField['alias']} debe tener un formato de correo."];
				}

				// /* Unique field validation */
				if ($valueField["unique"] && $this->entityManager->exist([
					$valueField["name"] => $formHttp[$valueField["name"]]
				]) == 1) {
					$this->errors[] = ["message" => "El campo {$valueField['alias']} debe ser unico."];
				}
			}
		}
		return $this;
	}
}
