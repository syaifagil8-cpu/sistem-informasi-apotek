<?php

namespace App\Controllers;

use App\Models\UserModel;

class Customer extends BaseController
{
    // Fungsi untuk menampilkan halaman login
    public function login()
    {
        // Seharusnya memanggil view login_customer
        return view('Backend/Login/login_customer');
    }

    public function auth_process()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $model->where('email', $email)->first();

        if ($data) {
            if ($password == $data['password']) { 
                $ses_data = [
                    'id'        => $data['id_customer'], 
                    'username'  => $data['nama_customer'],
                    'role'      => 'customer',
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                
                return redirect()->to('/customer/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('msg', 'Email tidak ditemukan');
            return redirect()->back();
        }
    }

    // Fungsi khusus dashboard customer
    public function dashboard()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }
        
        // Disesuaikan agar mengambil file dari folder Backend/Login
        return view('Backend/Login/dashboard_customer');
    }
}