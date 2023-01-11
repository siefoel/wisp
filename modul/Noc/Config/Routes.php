<?php
$routes->group('noc',['namespace' => 'Modul\Noc\Controllers'], function ($routes){
    $routes->add('/', 'Noc::index');
});