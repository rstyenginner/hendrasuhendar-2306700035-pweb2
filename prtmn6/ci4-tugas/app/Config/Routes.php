<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Group route untuk Dosen
$routes->group('dosen', function ($routes) {
    $routes->get('/', 'Dosen::index');           // URL: /dosen
    $routes->get('(:num)', 'Dosen::show/$1');    // URL: /dosen/1
});

// Group route untuk Mahasiswa
$routes->group('mahasiswa', function ($routes) {
    $routes->get('/', 'Mahasiswa::index');           // URL: /mahasiswa
    $routes->get('(:num)', 'Mahasiswa::show/$1');    // URL: /mahasiswa/1
});
