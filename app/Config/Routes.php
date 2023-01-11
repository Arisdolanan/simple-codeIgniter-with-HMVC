<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

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

// example grouping
// $routes->group('admin', ['namespace' => 'App\Modules\Master\Controllers'], function($subroutes){
//     $subroutes->add('/', 'Admin::index');
// });


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
foreach(glob(APPPATH . 'Modules/*', GLOB_ONLYDIR) as $item_dir)
{
	if (file_exists($item_dir . '/Config/Routes.php'))
	{
		require_once($item_dir . '/Config/Routes.php');
	}	
}


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}