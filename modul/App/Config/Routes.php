<?php
$routes->group('app',['namespace' => 'Modul\App\Controllers'], function ($routes){
    $routes->add('user', 'User::index');
    $routes->add('leveluser', 'Leveluser::index');
    $routes->add('thnajar', 'Tahunajar::index');
});