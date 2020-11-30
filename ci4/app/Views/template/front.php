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
            <?php
                $whoslogin = session()->get('pelanggan');
            ?>
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
                        <?php if (!empty($whoslogin)) : ?>
                            <li class="nav-item mt-2 mr-2">
                                <a href="<?= base_url('history')?>">History</a>
                            </li>

                            <li class="nav-item  mr-2">
                            <a href="<?php echo base_url('keranjang') ?>" class="nav-link" >Keranjang : <?php echo $quantity_total; ?></a>
                            </li>

                            <li class="nav-item mt-2 mr-2">
                                <span>nama : <?php echo $whoslogin['pelanggan'] ?></span>
                            </li>
                                
                            
                            <li class="nav-item mt-2 mr-2">
                                <a href="<?= base_url('masuk/logout')?>">Logout</a>
                            </li>
                            <?php else : ?>
                            <li class="nav-item mt-2 mr-2">
                                <a href="<?= base_url('daftar')?>">Daftar</a>
                            </li>

                            <li class="nav-item mt-2 ml-1">
                                <a href="<?= base_url('masuk')?>">Login</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </span>      
                </div>
            </nav>
 
        </div>
    </div>

  <div class="row mt-2">
    <div class="col-4">
        <h2>Kategori</h2>
        <div class="card">
            <?php if(empty($row)) { ?>
                <ul class="list-group list-group-flush">
                    <?php foreach ($kategori as $key => $value) : ?>
                        <li class="list-group-item"><a href="<?= base_url('/home/select' . '/' . $value['idkategori']) ?>"><?php echo $value['kategori'] ?></a></li>
                    <?php endforeach ?>
                </ul>
            <?php } ?>
        </div>
    </div>
    <div class="col-8 px-2">
        <?= $this->renderSection('content') ?>
    </div>
  </div>
</div>

      
</body>
</html>