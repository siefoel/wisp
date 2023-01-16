<?php
$routes->group('userlogin',['namespace' => 'Modul\Userlogin\Controllers'], function ($routes){
    $routes->add('/', 'Userlogin::index');
    $routes->add('datatable', 'Userlogin::datatable');
    $routes->add('simpan', 'Userlogin::simpan');
});