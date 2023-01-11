<?php
$routes->group('level',['namespace' => 'Modul\Level\Controllers'], function ($routes){
    $routes->add('/', 'Level::index');
    $routes->add('datatable', 'Level::datatable');
    $routes->add('simpan', 'Level::simpan');
});