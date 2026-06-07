<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'tbl_penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $allowedFields = [
        'id_penjualan', 'id_customer', 'id_admin',
        'tanggal', 'total', 'status'
    ];

    public function getLastId()
    {
        $row = $this->orderBy('id_penjualan', 'DESC')->first();
        return $row ? intval(substr($row['id_penjualan'], 3)) : 0;
    }
}