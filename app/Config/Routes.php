<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/penjumlahan/(:num)/(:num)', 'Home::penjumlahan/$1/$2');

$routes->get('web', 'Web::index');
$routes->get('web/about', 'Web::about');
