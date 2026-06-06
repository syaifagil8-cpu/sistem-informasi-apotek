<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'tbl_obat';
    protected $primaryKey = 'id_obat';
    protected $allowedFields = [
        'id_obat', 'id_kategori', 'id_supplier',
        'nama_obat', 'harga_beli', 'harga_jual',
        'stok', 'expired_date', 'gambar_obat', 'keterangan'
    ];

    // Ambil obat beserta nama kategori
    public function getObatWithKategori($keyword = null)
    {
        $builder = $this->db->table('tbl_obat o');
        $builder->select('o.*, k.nama_kategori');
        $builder->join('tbl_kategori k', 'k.id_kategori = o.id_kategori');
        $builder->where('o.stok >', 0);

        if ($keyword) {
            $builder->like('o.nama_obat', $keyword);
        }

        return $builder->get()->getResultArray();
    }

    // Ambil detail 1 obat
    public function getDetail($id)
    {
        $builder = $this->db->table('tbl_obat o');
        $builder->select('o.*, k.nama_kategori');
        $builder->join('tbl_kategori k', 'k.id_kategori = o.id_kategori');
        $builder->where('o.id_obat', $id);
        return $builder->get()->getRowArray();
    }
}