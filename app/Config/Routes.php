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
$routes->get('/user/account', 'User::profile');
$routes->post('/user/update-profile', 'User::update_profile');
$routes->post('/user/change-password', 'User::update_security');
$routes->get('/user/logout', 'User::logout');

// Test Routes
$routes->get('/test', 'Test::index');
$routes->get('/test/get-session', 'Test::getSession');
$routes->get('/test/close-session', 'Test::destroySession');