<?php

namespace core;

class ValidatorManager
{
	protected $entity = null;
	private $errors = [];

	public function getErrors()
	{
		return $this->errors;
	}

	public  function validateFieldEntity($formHttp,  $fields)
	{

		foreach ($fields as $keyField => $valueField) {
			/* Required validation */
			if ($valueField["required"] && empty($formHttp[$valueField["name"]])) {
				$this->errors[] = ["message" => "El campo {$valueField['alias']} es requerido."];
			}

			if ($valueField["required"]  && !empty($formHttp[$valueField["alias"]])) {
				if (isset($formHttp[$valueField["name"]])) {
					/* Min Length validation */
					if (strlen($formHttp[$valueField["name"]]) <  $valueField["min"]) {
						$this->errors[] = ["message" => "El campo {$valueField['alias']} debe contener minimo {$valueField['min']} caracteres."];
					}

					// /* Mail validation */
					if ($valueField["is_mail"] && !\helpers\validator\Validator::isMail($formHttp[$valueField["name"]])) {
						$this->errors[] = ["message" => "El campo {$valueField['alias']} debe tener un formato de correo."];
					}
				}
			}
		}
		return $this;
	}
}
