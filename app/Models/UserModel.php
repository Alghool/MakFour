<?php


namespace APP\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table      = 'users';
	protected $primaryKey = 'user_id';

	protected $useAutoIncrement = true;

	protected $returnType     = \App\Entities\User::class;
	protected $useSoftDeletes = false;

	protected $validationRules = [
		'user_id'      => 'if_exist|numeric',
		'email'        => 'max_length[254]|valid_email|is_unique[users.email,users.user_id,{user_id}]',
	];

	protected $validationMessages = [
		'email' => [
			'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
		],
	];

	protected $allowedFields = ['name', 'email', 'password', 'type', 'pic', 'phone'];



}