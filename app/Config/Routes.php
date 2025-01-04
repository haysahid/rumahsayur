<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'AuthController::loginView');
$routes->post('login-action', 'AuthController::login');
$routes->get('register', 'AuthController::registerView');
$routes->post('register-action', 'AuthController::register');

$routes->get('dashboard', 'DashboardController::index');
$routes->get('user', 'UserController::index');
$routes->get('store', 'StoreController::index');
$routes->get('product', 'ProductController::index');
$routes->get('product/create', 'ProductController::createView');
$routes->post('product/create-action', 'ProductController::create');
$routes->get('product/update/(:num)', 'ProductController::updateView/$1');
$routes->post('product/update-action/(:num)', 'ProductController::update/$1');
$routes->get('product/delete/(:num)', 'ProductController::delete/$1');

$routes->group('api', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->resource('user', ['controller' => 'UserController']);
    $routes->resource('store', ['controller' => 'StoreController']);
    $routes->resource('product', ['controller' => 'ProductController']);
});
