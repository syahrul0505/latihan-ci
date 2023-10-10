<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/penjumlahan/(:num)/(:num)', 'Home::penjumlahan/$1/$2');

// Web Latihan 4
$routes->get('web', 'Web::index');
$routes->get('web/about', 'Web::about');

// Latihan 5 Matakuliah
$routes->get('matakuliah', 'Matakuliah::index');
$routes->post('matakuliah/cetak', 'Matakuliah::cetak');
