<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function login()
    {
        return view('Backend/Login/login');
    }

    public function cek_login()
    {
        // Logika pengecekan login Anda di sini
        // Setelah berhasil, arahkan ke dashboard menggunakan redirect()
        return redirect()->to('admin/dashboard-admin');
    }

    public function dashboard()
    {
        echo view('Backend/Template/header');
        echo view('Backend/Template/sidebar');
        echo view('Backend/Login/dashboard_admin');
        echo view('Backend/Template/footer');
    }
}