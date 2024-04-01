<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index',  ['filter' => \App\Filters\AuthFilter::class]);

$routes->get('/login', 'LoginController::login');
$routes->post('/signup', 'LoginController::doSignup');

