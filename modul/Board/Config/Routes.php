<?php
$routes->group('board',['namespace' => 'Modul\Board\Controllers'], function ($routes){
    $routes->add('/', 'Board::index');
    $routes->add('add', 'Board::add');
});