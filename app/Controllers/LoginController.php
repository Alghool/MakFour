<?php

namespace App\Controllers;

use App\Entities\User;

class LoginController extends BaseController
{

	public function login(){
		$twig = \Config\Services::twig();
		$twig->display( 'login');
	}

	public function doSignup(){
		$user = new User();
		$user->name = $this->request->getPost('name');
		$user->password = $this->request->getPost('password');
		$user->email = $this->request->getPost('email');
		$user->phone = $this->request->getPost('phone');
		$valid = $user->withoutProtection()->save();


		dd($valid, $user->getErrors(), $user);
	}
}