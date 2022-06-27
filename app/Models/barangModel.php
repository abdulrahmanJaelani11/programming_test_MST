<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'm_barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['kode', 'nama_barang', 'harga'];
}
