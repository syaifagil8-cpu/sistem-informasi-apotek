<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_customer';
    protected $primaryKey = 'id_customer';
    protected $allowedFields = ['id_customer', 'nama_customer', 'alamat', 'telepon', 'email', 'password'];
}