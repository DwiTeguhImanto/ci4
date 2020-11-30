<?= $this->extend('template/front') ?>

<?= $this->section('content') ?>

<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $jumlah = 3;
        $no = ($jumlah * $page ) - $jumlah+1;
    }else {
        $no = 1;
    }
?>





<div class="row mt-2">
<div class="col">
<div class="row">
    <?php foreach ($menu as $key ): ?>
        <div class="card ml-3 mb-3 shadow" style="width: 14rem; ">
                <img src="<?= base_url('/upload/' . $key['gambar'] . ''); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><?= $key['menu'] ?></h5>
                    <p class="card-text">Rp.<?= number_format($key['harga'])  ?></p>
                    <span class="badge badge-pill badge-success mb-2"></span>
                    <a href="<?=  base_url('tambah_keranjang/'.$key['idmenu']) ?>" class="btn btn-info">Beli Sekarang</a>
                </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $pager->makeLinks(1 , $tampil , $total, 'bootstrap') ?>

</div>
</div>

<?= $this->endSection() ?>
