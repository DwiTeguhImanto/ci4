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

    // validation
    protected $validationRules = [
        'menu' => 'alpha_numeric_space|min_length[3]|is_unique[tblmenu.menu]',
        'harga' => 'numeric'
    ];

    protected $validationMessages = [
        'menu' => [
            'alpha_numeric_space' => 'tidak boleh guna simbol',
            'min_length' => 'minimal 3 huruf',
            'is_unique' => 'sorry nama data ada yg sama'
        ],

        'harga' => [
            'numeric' => 'harus angka',
        ]
    ];

}


?>