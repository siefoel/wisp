<?php
$routes->group('mitra',['namespace' => 'Modul\Mitra\Controllers'], function ($routes){
    $routes->add('/', 'Mitra::index');
    $routes->add('datatable', 'Mitra::datatable');
});