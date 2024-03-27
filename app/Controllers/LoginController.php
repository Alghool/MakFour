<?php

namespace App\Controllers;

class LoginController extends BaseController
{

	public function login(){
		$twig = \Config\Services::twig();
		$twig->display( 'login');
	}

}