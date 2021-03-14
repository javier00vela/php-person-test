<?php
namespace core;
use \core\ConnectionDB;
class EntityManager  extends ConnectionDB
{
	private $cnx = null;
    private $entity;
    private $result = null;

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

	public function wheteOr(array $arrayPost){
		$this->result = $this->cnx->fetchAll("SELECT * FROM {$this->entity->table} where ?or" , $arrayPost);
		return $this;
	}

	public function save(array $field){
		$this->cnx->query("INSERT INTO  {$this->entity->table} ?", $field);
		return $this->cnx->getInsertId();
	}

	public function exist(array $field){
		$this->result = $this->cnx->fetch("SELECT count(*) as cant FROM {$this->entity->table} WHERE", $field);
		return ($this->get()->cant > 0) ? 1 : 0 ;
	}


	public function get(){
		return $this->result;
	}

}
?>