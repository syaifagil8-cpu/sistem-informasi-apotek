<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPenjualanModel extends Model
{
    protected $table = 'tbl_detail_penjualan';
    protected $primaryKey = 'id_detail_penjualan';
    protected $allowedFields = [
        'id_detail_penjualan', 'id_penjualan',
        'id_obat', 'qty', 'subtotal'
    ];

    public function getByPenjualan($id_penjualan)
    {
        $builder = $this->db->table('tbl_detail_penjualan d');
        $builder->select('d.*, o.nama_obat, o.harga_jual');
        $builder->join('tbl_obat o', 'o.id_obat = d.id_obat');
        $builder->where('d.id_penjualan', $id_penjualan);
        return $builder->get()->getResultArray();
    }
}