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
    // KERANJANG
    // =====================
    public function keranjang()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }

        $cart = session()->get('cart') ?? [];
        $data = ['cart' => $cart];
        return view('Backend/Customer/keranjang', $data);
    }

    public function tambah_keranjang($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }

        $model = new \App\Models\ObatModel();
        $obat = $model->getDetail($id);

        if (!$obat) {
            session()->setFlashdata('msg', 'Obat tidak ditemukan!');
            return redirect()->to('/customer/obat');
        }

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += 1;
            $cart[$id]['subtotal'] = $cart[$id]['qty'] * $obat['harga_jual'];
        } else {
            $cart[$id] = [
                'id_obat'   => $obat['id_obat'],
                'nama_obat' => $obat['nama_obat'],
                'harga'     => $obat['harga_jual'],
                'qty'       => 1,
                'subtotal'  => $obat['harga_jual']
            ];
        }

        session()->set('cart', $cart);
        session()->setFlashdata('success', 'Obat berhasil ditambahkan ke keranjang!');
        return redirect()->to('/customer/obat');
    }

    public function hapus_keranjang($id)
    {
        $cart = session()->get('cart') ?? [];
        unset($cart[$id]);
        session()->set('cart', $cart);
        return redirect()->to('/customer/keranjang');
    }

    public function checkout()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }

        $cart = session()->get('cart') ?? [];

        if (empty($cart)) {
            session()->setFlashdata('msg', 'Keranjang masih kosong!');
            return redirect()->to('/customer/keranjang');
        }

        $penjualanModel      = new \App\Models\PenjualanModel();
        $detailModel         = new \App\Models\DetailPenjualanModel();
        $obatModel           = new \App\Models\ObatModel();

        // Generate ID penjualan
        $lastNumber = $penjualanModel->getLastId();
        $newId      = 'PJL' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        // Hitung total
        $total = array_sum(array_column($cart, 'subtotal'));

        // Simpan ke tbl_penjualan
        $penjualanModel->insert([
            'id_penjualan' => $newId,
            'id_customer'  => session()->get('id'),
            'id_admin'     => 'ADM01',
            'tanggal'      => date('Y-m-d'),
            'total'        => $total,
            'status'       => 'Belum Lunas'
        ]);

        // Simpan detail & kurangi stok
        $i = 1;
        foreach ($cart as $item) {
            $idDetail = 'DTL' . str_pad($i, 3, '0', STR_PAD_LEFT);
            $detailModel->insert([
                'id_detail_penjualan' => $idDetail . substr($newId, 3),
                'id_penjualan'        => $newId,
                'id_obat'             => $item['id_obat'],
                'qty'                 => $item['qty'],
                'subtotal'            => $item['subtotal']
            ]);

            // Kurangi stok
            $obat = $obatModel->find($item['id_obat']);
            $obatModel->update($item['id_obat'], [
                'stok' => $obat['stok'] - $item['qty']
            ]);

            $i++;
        }

        // Kosongkan keranjang
        session()->remove('cart');
        session()->setFlashdata('success', 'Checkout berhasil! Pesanan sedang diproses.');
        return redirect()->to('/customer/transaksi');
    }

    // =====================
    // RIWAYAT TRANSAKSI
    // =====================
    public function transaksi()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }

        $penjualanModel = new \App\Models\PenjualanModel();
        $data = [
            'transaksi' => $penjualanModel
                            ->where('id_customer', session()->get('id'))
                            ->orderBy('tanggal', 'DESC')
                            ->findAll()
        ];

        return view('Backend/Customer/riwayat_transaksi', $data);
    }

    public function detail_transaksi($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }

        $detailModel = new \App\Models\DetailPenjualanModel();
        $penjualanModel = new \App\Models\PenjualanModel();

        $data = [
            'transaksi' => $penjualanModel->find($id),
            'detail'    => $detailModel->getByPenjualan($id)
        ];

        return view('Backend/Customer/detail_transaksi', $data);
    }

    // =====================
    // PROFIL
    // =====================
    public function profil()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }

        $model = new UserModel();
        $data = [
            'customer' => $model->find(session()->get('id'))
        ];

        return view('Backend/Customer/profil', $data);
    }

    public function update_profil()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }

        $model = new UserModel();
        $id = session()->get('id');

        $data = [
            'nama_customer' => $this->request->getVar('nama_customer'),
            'alamat'        => $this->request->getVar('alamat'),
            'telepon'       => $this->request->getVar('telepon'),
            'email'         => $this->request->getVar('email'),
        ];

        // Kalau isi password baru
        $password_baru = $this->request->getVar('password');
        if (!empty($password_baru)) {
            $data['password'] = password_hash($password_baru, PASSWORD_DEFAULT);
        }

        $model->update($id, $data);

        // Update session nama
        session()->set('username', $data['nama_customer']);
        session()->setFlashdata('success', 'Profil berhasil diupdate!');
        return redirect()->to('/customer/profil');
    }
    
    // =====================
    // PEMBAYARAN
    // =====================
    public function bayar($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/customer/login');
        }

        $penjualanModel = new \App\Models\PenjualanModel();
        $transaksi = $penjualanModel->find($id);

        // Pastikan transaksi milik customer yang login
        if (!$transaksi || $transaksi['id_customer'] != session()->get('id')) {
            session()->setFlashdata('msg', 'Transaksi tidak ditemukan!');
            return redirect()->to('/customer/transaksi');
        }

        // Update status jadi Lunas
        $penjualanModel->update($id, ['status' => 'Lunas']);

        session()->setFlashdata('success', 'Pembayaran berhasil! Transaksi sudah lunas.');
        return redirect()->to('/customer/transaksi');
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