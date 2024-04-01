<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends BaseEntity
{
	public  $model     = \App\Models\UserModel::class;
}