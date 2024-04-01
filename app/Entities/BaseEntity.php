<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class BaseEntity extends Entity
{
	protected $model;
	private $modelInstance = null;

	public function __construct(?array $data = null)
	{
		parent::__construct($data);
		$this->getModelInstance();
	}

	protected function getModelInstance($forceNew = false){
		if( $this->modelInstance === null ){
			$this->modelInstance = new $this->model();
		}
		return ($forceNew)? new $this->model() : $this->modelInstance;
	}

	public function save(){
		$this->modelInstance->save($this);
	}

	public function saveWithProtect()
	{
		$result = $this->modelInstance->protect(false)->save($this);
		$this->modelInstance->protect(true);
		return $result;
	}

	public function getErrors(bool $forceDB = false){
		return $this->modelInstance->errors($forceDB);
	}
}