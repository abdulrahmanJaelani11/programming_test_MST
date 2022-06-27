<?php

namespace App\Models;

use CodeIgniter\Model;

class TsalesModel extends Model
{
    protected $table = 't_sales';
    protected $primaryKey = 'id_sales';
    protected $allowedFields = ['kode', 'tanggal', 'cus_id', 'sub_total', 'diskon', 'ongkir', 'total', 'jumlah', 'no_transaksi'];
}
