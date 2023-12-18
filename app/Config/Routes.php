<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// User Auth
$routes->get('/user/login', 'User::index');
$routes->post('/user/login', 'User::login_submission');
$routes->get('/user/register', 'User::register');
$routes->post('/user/register', 'User::register_submission');
$routes->get('/user/profile', 'User::profile');

// Test Routes
$routes->get('/test', 'Test::index');
$routes->get('/test/get-session', 'Test::getSession');