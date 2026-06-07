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
$routes->get('customer/keranjang', 'Customer::keranjang');
$routes->get('customer/tambah-keranjang/(:any)', 'Customer::tambah_keranjang/$1');
$routes->get('customer/hapus-keranjang/(:any)', 'Customer::hapus_keranjang/$1');
$routes->get('customer/checkout', 'Customer::checkout');
$routes->get('customer/transaksi', 'Customer::transaksi');
$routes->get('customer/detail-transaksi/(:any)', 'Customer::detail_transaksi/$1');
$routes->get('customer/profil', 'Customer::profil');
$routes->post('customer/update_profil', 'Customer::update_profil');