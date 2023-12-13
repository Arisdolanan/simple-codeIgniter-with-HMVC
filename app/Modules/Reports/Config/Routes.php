<?php

namespace App\Modules\Masters\Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('report', ['namespace' => 'App\Modules\Reports\Controllers'], static function ($routes) {
    $routes->get('/', 'ReportControllers::index');
});
