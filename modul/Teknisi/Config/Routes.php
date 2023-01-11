<?php
$routes->group('teknisi',['namespace' => 'Modul\Teknisi\Controllers'], function ($routes){
    $routes->add('/', 'Teknisi::index');
});