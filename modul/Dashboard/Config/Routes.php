<?php
$routes->group('dashboard',['namespace' => 'Modul\Dashboard\Controllers'], function ($routes){
    $routes->get('/', 'Dashboard::index');
    $routes->get('paket', 'Dashboard::paket');
});