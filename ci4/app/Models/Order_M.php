<?php

namespace App\Models;
use CodeIgniter\Model;

class Order_M extends  Model
{
    // read db
    protected $table = 'order';

    protected $allowedFields = ['idpelanggan','tglorder','total','bayar','kembali','status'];
    
    protected $primaryKey = 'idorder';

}


?>