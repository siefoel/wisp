<?php
$routes->group('alamat',['namespace' => 'Modul\Alamat\Controllers'], function ($routes){
    $routes->add('/', 'Alamat::index');
});