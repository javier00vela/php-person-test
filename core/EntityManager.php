<?php

namespace core;

class EntityManager  extends \core\ConnectionDB
{
	private $cnx = null;
    private $entity;
    private $result = null;
	private static $instance;

	public function __construct()
	{
		$this->cnx = parent::getInstance();
	}

	public function entity($entity){
		$this->entity = $entity;
		return $this;
	}

	
	public function findAll(){
		$this->result = $this->cnx->fetchAll("SELECT * FROM {$this->entity->table}");
		return $this;
	}

	public function get(){
		return $this->result;
	}

}


?>