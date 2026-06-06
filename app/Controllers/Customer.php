<?php

namespace App\Controllers;

use App\Models\UserModel;

class Customer extends BaseController
{
    // =====================
    // LOGIN
    // =====================
    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/customer/dashboard');
        }
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
            if (password_verify($password, $data['password'])) {
                $ses_data = [
                    'id'        => $data['id_customer'],
                    'username'  => $data['nama_customer'],
                    'role'      => 'customer',
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/customer/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password salah!');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('msg', 'Email tidak ditemukan!');
            return redirect()->back();
        }
    }

    // =====================
    // REGISTRASI
    // =====================
    public function register()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/customer/dashboard');
        }
        return view('Backend/Login/register_customer');
    }

    public function register_process()
    {
        $model = new UserModel();

        // Cek email sudah terdaftar atau belum
        $cek = $model->where('email', $this->request->getVar('email'))->first();
        if ($cek) {
            session()->setFlashdata('msg', 'Email sudah terdaftar!');
            return redirect()->back();
        }

        // Generate ID customer otomatis
        $last = $model->orderBy('id_customer', 'DESC')->first();
        $lastNumber = $last ? intval(substr($last['id_customer'], 3)) : 0;
        $newId = 'CST' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        $data = [
            'id_customer'   => $newId,
            'nama_customer' => $this->request->getVar('nama_customer'),
            'alamat'        => $this->request->getVar('alamat'),
            'telepon'       => $this->request->getVar('telepon'),
            'email'         => $this->request->getVar('email'),
            'password'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        $model->insert($data);
        session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
        return redirect()->to('/customer/login');
    }

    // =====================
    // DASHBOARD
    // =====================
    public function dashboard()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }
        return view('Backend/Login/dashboard_customer');
    }

    // =====================
    // LOGOUT
    // =====================
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/customer/login');
    }

    // =====================
    // CARI OBAT
    // =====================
    public function obat()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }

        $model = new \App\Models\ObatModel();
        $keyword = $this->request->getVar('keyword');

        $data = [
            'obat'    => $model->getObatWithKategori($keyword),
            'keyword' => $keyword
        ];

        return view('Backend/Customer/cari_obat', $data);
    }

    public function detail_obat($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }

        $model = new \App\Models\ObatModel();
        $data = [
            'obat' => $model->getDetail($id)
        ];

        return view('Backend/Customer/detail_obat', $data);
    }
}