<?php
$routes->group('user',['namespace' => 'Modul\User\Controllers'], function ($routes){
    $routes->add('/', 'User::index');
    $routes->add('datauser', 'User::datatable');
});