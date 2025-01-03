<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/products', 'Product::index');
$routes->get('/products/(:num)', 'Product::show/$1');
