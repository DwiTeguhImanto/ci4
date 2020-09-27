<?php

namespace App\Models;
use CodeIgniter\Model;

class Menu_M extends  Model
{
    // read db
    protected $table = 'tblmenu';

    // delete
    protected $primaryKey = 'idmenu';

    protected $allowedFields = ['idkategori', 'menu', 'gambar', 'harga'];
}


?>