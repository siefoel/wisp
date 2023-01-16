<?php
$routes->group('alamat',['namespace' => 'Modul\Alamat\Controllers'], function ($routes){
    $routes->add('/', 'Alamat::index');
    $routes->add('simpan', 'Alamat::simpan');
    $routes->add('getkota', 'Alamat::getkota');
    $routes->add('getkec', 'Alamat::getkec');
    $routes->add('getdesa', 'Alamat::getdesa');
});