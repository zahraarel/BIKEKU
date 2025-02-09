<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('register', 'Home::register');
$routes->get('success', 'Register::success');
$routes->get('home', 'Home::dashboard');  // Menampilkan halaman dashboard
$routes->get('/logout', 'Logout::index');


$routes->post('login/authenticate', 'Login::authenticate');
$routes->post('register', 'Register::save');   // Menangani data form yang disubmit


$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('home', 'Home::dashboard'); 

        //jadwal
        $routes->get('/kelola_jadwal', 'KelolaJadwalController::index');
        $routes->get('/edit/(:num)', 'KelolaJadwalController::edit/$1');
        $routes->get('/delete/(:num)', 'KelolaJadwalController::delete/$1');
        $routes->get('kelola_jadwal/tambah', 'KelolaJadwalController::tambah');

        $routes->post('kelola_jadwal/update/(:num)', 'KelolaJadwalController::update/$1');
        $routes->post('/kelola_jadwal/simpan', 'KelolaJadwalController::simpan');


        // Menampilkan halaman daftar kendaraan
        $routes->get('kendaraan', 'Kendaraan::index');
        $routes->get('kendaraan/delete/(:num)', 'Kendaraan::delete/$1');
        $routes->get('kendaraan/edit/(:segment)', 'Kendaraan::edit/$1');

        $routes->post('kendaraan/update/(:segment)', 'Kendaraan::update/$1');
        $routes->post('kendaraan/add', 'Kendaraan::add');


        //bengkel

        $routes->get('/bengkel', 'Bengkel::index'); // Halaman utama daftar bengkel
        $routes->post('/bengkel/tambah', 'Bengkel::tambah'); // Menambah bengkel
        $routes->get('/bengkel/edit/(:num)', 'Bengkel::edit/$1'); // Halaman edit bengkel berdasarkan ID
        $routes->post('/bengkel/update/(:num)', 'Bengkel::update/$1'); // Mengupdate data bengkel
        $routes->get('/bengkel/hapus/(:num)', 'Bengkel::hapus/$1'); // Menghapus bengkel berdasarkan ID


        //Maps 
        $routes->get('/maps', 'Maps::index');
        $routes->get('maps/getBengkelData', 'Maps::getBengkelData');
});