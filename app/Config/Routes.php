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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('hitung', 'Home::hitung');

$routes->add('login', 'Login::index');
$routes->add('login/auth', 'Login::login');
$routes->add('logout/auth', 'Login::logout');

$routes->add('admin/getkota', 'Admin::getkota', ['filter' => 'auth']);
$routes->add('admin/addkota', 'Admin::addkota', ['filter' => 'auth']);
$routes->add('admin/savekota', 'Admin::savekota');
$routes->add('admin/getuser', 'Admin::getuser', ['filter' => 'auth']);
$routes->add('admin/adduser', 'Admin::adduser', ['filter' => 'auth']);
$routes->add('admin/saveuser', 'Admin::saveuser');

$routes->add('pegawai/getperdin', 'Pegawai::index', ['filter' => 'auth']);
$routes->add('pegawai/addperdin', 'Pegawai::add', ['filter' => 'auth']);
$routes->add('pegawai/saveperdin', 'Pegawai::saveperdin');

$routes->add('sdm/getperdin', 'Sdm::index', ['filter' => 'auth']);
$routes->add('sdm/getpegawai', 'Sdm::getpegawai', ['filter' => 'auth']);
$routes->add('sdm/approvalperdin/(:segment)', 'Sdm::approvalPerdin/$1', ['filter' => 'auth']);
$routes->add('sdm/approve/(:segment)', 'Sdm::approve/$1', ['filter' => 'auth']);
$routes->add('sdm/reject/(:segment)', 'Sdm::reject/$1', ['filter' => 'auth']);
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
