<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/home', 'Home::index');
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('/empanadas', 'Empanada::index', ['as' => 'empanadas']);
