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

// Rute untuk login customer
$routes->get('customer/login', 'Customer::login');
$routes->post('customer/auth_process', 'Customer::auth_process');
$routes->get('customer/dashboard', 'Customer::dashboard');