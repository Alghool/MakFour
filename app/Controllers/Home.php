<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
	    $twig = \Config\Services::twig();
	    $twig->display( 'home', [] );
    }
}
