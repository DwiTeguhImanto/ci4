<?php

namespace App\Models;
use CodeIgniter\Model;

class User_M extends  Model
{
    // read db
    protected $table = 'tbluser';

    protected $allowedFields = ['user','email','password','level','aktif'];

    protected $primaryKey = 'iduser';

    protected $validationRules = [
        'user' => 'alpha_numeric_space|min_length[3]|is_unique[tbluser.user]',
        'email' => 'valid_email'
    ];

    protected $validationMessages = [
        'user' => [
            'alpha_numeric_space' => 'tidak boleh guna simbol',
            'min_length' => 'minimal 3 huruf',
            'is_unique' => 'sorry ada nama user yang sama'
        ],

        'email' => [
            'valid_email' => 'Penulisan Email Salah !',
        ]
    ];
}


?>