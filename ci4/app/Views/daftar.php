<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/bootstrap/css/bootstrap.min.css')?>">
    <title>User Layout</title>
</head>
<body>

<div class="container">
    <div class="row mt-2">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="<?= base_url('home') ?>">Kedai Runcit</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <span class="navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item mt-2 mr-2">
                                <a href="<?= base_url('daftar')?>">Daftar</a>
                            </li>
                                
                            <li class="nav-item mt-2 ml-1">
                                <a href="<?= base_url('admin/login/logout')?>">Logout</a>
                            </li>
                        </ul>
                    </span>      
                </div>
            </nav>
 
        </div>
    </div>

    <div class="col">
    <h3>  Registrasi Pelanggan</h3>
</div>

<div class="col-8">
<?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key.'=>'.$value;
            echo "</br>";
        }

        echo '</div>';
        
    }
        
?>
<form action="<?= base_url('daftar/regis')?>" method="post">
    <div class="form-group">
        <label for="kategori">Nama Pelanggan</label>
         <input type="text" class="form-control" name="pelanggan" required>
    </div>
    
    <div class="form-group">
        <label for="keterangan">Alamat</label>
        <input type="text" class="form-control" name="alamat" >
    </div>

    <div class="form-group">
        <label for="keterangan">No Telepon </label>
        <input type="number" class="form-control" name="telp" >
    </div>

    <div class="form-group">
        <label for="keterangan">Email </label>
        <input type="email" class="form-control" name="email" required>
    </div>

    <div class="form-group">
        <label for="keterangan">password </label>
        <input type="password" class="form-control" name="password" >
    </div>

    

    <input type="submit" name="simpan" value="Simpan">

</form>
</div>

</div>

      
</body>
</html>