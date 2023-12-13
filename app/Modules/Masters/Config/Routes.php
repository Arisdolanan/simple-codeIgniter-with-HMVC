<?php

namespace App\Modules\Masters\Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('admin', ['namespace' => 'App\Modules\Masters\Controllers'], static function ($routes) {
    $routes->get('/', 'AdminControllers::index');
});
