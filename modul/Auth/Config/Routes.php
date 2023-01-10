<?php
$routes->group('auth',['namespace' => 'Modul\Auth\Controllers'], function ($routes){
    $routes->get('/', 'Auth::index');
    $routes->get('register', 'Auth::register');
    $routes->get('reset', 'Auth::reset');
    $routes->get('forgout', 'Auth::forgout');
});