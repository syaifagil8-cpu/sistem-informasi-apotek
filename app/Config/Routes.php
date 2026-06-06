<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::login');
$routes->get('admin/login', 'Admin::login');
$routes->post('auth/cek_login', 'Admin::cek_login'); // Rute untuk form POST
$routes->get('admin/dashboard-admin', 'Admin::dashboard'); // Rute untuk akses dashboard

// Customer Routes
$routes->get('customer/login', 'Customer::login');
$routes->post('customer/auth_process', 'Customer::auth_process');
$routes->get('customer/register', 'Customer::register');
$routes->post('customer/register_process', 'Customer::register_process');
$routes->get('customer/dashboard', 'Customer::dashboard');
$routes->get('customer/logout', 'Customer::logout');
$routes->get('customer/obat', 'Customer::obat');
$routes->get('customer/detail-obat/(:any)', 'Customer::detail_obat/$1');