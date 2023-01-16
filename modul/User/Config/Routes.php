<?php
$routes->group('user',['namespace' => 'Modul\User\Controllers'], function ($routes){
    $routes->add('/', 'User::index');
    $routes->add('datatable', 'User::datatable');
    $routes->add('simpan', 'User::simpan');
});