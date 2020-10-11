<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php
    if (isset($_GET['page_page'])) {
        $page = $_GET['page_page'];
        $jumlah = 3;
        $no = ($jumlah * $page ) - $jumlah+1;
    }else {
        $no = 1;
    }
?>

<div class="row">

    <div class="col">
    <h3><?php echo $judul;?></h3>
    </div>
</div>





<div class="row mt-2">
<div class="col">
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Tanggal Order</th>
        <th>Menu</th>
        <th>Harga</th>
        <th>jumlah</th>
        <th>Total</th>
        
       
        
    </tr>
    <?php $no ?>
    <?php foreach ($orderdetail as $key => $value):  ?>

    <tr>
        <td><?= $no++?></td>
        <td><?= $value['tglorder'] ?></td>
        <td><?= $value['menu'] ?></td>
        <td><?= $value['harga'] ?></td>
        <td><?= $value['jumlah'] ?></td>
        <td><?= $value['jumlah'] * $value['harga'] ?></td>
      

    </tr>
    <?php endforeach; ?>

</table>

<?= $pager->links('page','bootstrap') ?>
</div>
</div>

<?= $this->endSection() ?>
