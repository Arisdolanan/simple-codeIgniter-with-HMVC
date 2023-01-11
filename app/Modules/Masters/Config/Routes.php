<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

/*** Group Admin ***/
$routes->group('admin', ['namespace' => 'App\Modules\Masters\Controllers'], function($subroutes){
    $subroutes->add('test', 'AdminController::index');
});