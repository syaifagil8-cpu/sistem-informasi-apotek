<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_customer'; // Mengarah ke tbl_customer
    protected $primaryKey = 'id_customer'; // Pastikan nama primary key sesuai di database
    protected $allowedFields = ['email', 'password', 'nama_customer']; 
}