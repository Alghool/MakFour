<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class BaseEntity extends Entity
{
	protected $model;
	private ?\CodeIgniter\Model $modelInstance = null;
	private $withoutProtectionFlag = false;
	private $withoutValidationFlag = false;

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
		$result = $this->modelInstance->save($this);
		if($this->withoutProtectionFlag){
			$this->modelInstance->protect(true);
			$this->withoutProtectionFlag = false;
		}
		if($this->withoutValidationFlag){
			$this->modelInstance->skipValidation(false);
			$this->withoutValidationFlag = false;
		}
		return $result;
	}

	public function  withoutProtection(): BaseEntity
	{
		$this->modelInstance->protect(false);
		$this->withoutProtectionFlag = true;
		return $this;
	}

	public function withoutValidation(): BaseEntity
	{
		$this->modelInstance->skipValidation();
		$this->withoutValidationFlag = true;
		return $this;
	}



	public function getErrors(bool $forceDB = false){
		return $this->modelInstance->errors($forceDB);
	}
}