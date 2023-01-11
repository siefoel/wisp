<?php
$routes->group('callsenter',['namespace' => 'Modul\Cs\Controllers'], function ($routes){
    $routes->add('/', 'Cs::index');
});