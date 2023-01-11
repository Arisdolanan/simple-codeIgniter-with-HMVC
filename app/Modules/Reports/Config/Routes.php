<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

/*** Group Admin ***/
$routes->group('report', ['namespace' => 'App\Modules\Reports\Controllers'], function($subroutes){
    $subroutes->add('test', 'ReportController::index');
});