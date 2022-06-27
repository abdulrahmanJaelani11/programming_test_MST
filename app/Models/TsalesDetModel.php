<?php

namespace App\Models;

use CodeIgniter\Model;

class TsalesDetModel extends Model
{
    protected $table = 't_sales_det';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_cus', 'no_transaksi', 'tanggal', 'id_cus', 'jumlah_barang', 'sub_total', 'diskon', 'ongkir', 'total'];
}
