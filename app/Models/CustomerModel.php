<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'm_customer';
    protected $primaryKey = 'id';
    protected $allowedField = ['kode', 'nama', 'telp'];
}
