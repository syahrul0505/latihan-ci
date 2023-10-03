<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::penjumlahan');
$routes->get('/penjumlahan/(:num)/(:num)', 'Home::penjumlahan/$1/$2');
