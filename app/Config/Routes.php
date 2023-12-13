<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// alpha -> alphabet | num -> number | any -> alphabet or number or etc
$routes->get('/about/(:any)/(:num)', 'About::index/$1/$2');
$routes->add("/auth/(:any)/(:num)", "Auth\Login::index/$1/$2");

/*
 * --------------------------------------------------------------------
 * HMVC Routing
 * --------------------------------------------------------------------
 */
// example manual and then delete all config folders in the modules folder
// $routes->group('admin', ['namespace' => 'App\Modules\Master\Controllers'], function($subroutes){
//     $subroutes->add('/', 'Admin::index');
// });

// example generate by modules add config folders in the modules folder
// thanks to github.com/MufidJamaluddin/Codeigniter4-HMVC
foreach (glob(APPPATH . 'Modules/*', GLOB_ONLYDIR) as $item_dir) {
    if (file_exists($item_dir . '/Config/Routes.php')) {
        require_once($item_dir . '/Config/Routes.php');
    }
}
