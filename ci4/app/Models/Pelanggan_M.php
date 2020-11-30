<?php

namespace App\Models;
use CodeIgniter\Model;

class Pelanggan_M extends  Model
{
    // read db
    protected $table = 'tblpelanggan';

    protected $primaryKey = 'idpelanggan';

    protected $allowedFields = ['pelanggan','alamat','telp','email','password','aktif'];

    protected $validationRules = [
        'pelanggan' => 'alpha_numeric_space|min_length[3]|is_unique[tbluser.user]',
        'email' => 'valid_email',
        'alamat' => 'required',
        'telp' => 'required',
        'password' => 'required'
    ];

    protected $validationMessages = [
        'pelanggan' => [
            'alpha_numeric_space' => 'tidak boleh guna simbol',
            'min_length' => 'minimal 3 huruf',
            'is_unique' => 'sorry ada nama user yang sama'
        ],

        'email' => [
            'valid_email' => 'Penulisan Email Salah !',
        ],

        'alamat' => [
            'required' => 'Harus diisi !',
        ],

        'telp' => [
            'required' => 'Harus diisi !',
        ],
        'password' => [
            'required' => 'Harus diisi !',
        ]
        
    ];
   
}


?>