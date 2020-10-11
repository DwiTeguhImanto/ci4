<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>


<div class="row">
    <div class="col">
    <h1><?= $judul ?></h1>
        
    </div>
</div>
<div class="row">
    <div class="col">
        <p>Pelanggan : <?= $order[0]['pelanggan']?></p>
    </div>
    <div class="col">
        <p>Tanggal Order : <?= date("d-m-Y", strtotime($order[0]['tglorder'])) ?></p>
    </div>
    <div class="col">
        <p>Total : <b> <?= number_format($order[0]['total']) ?></b></p>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Rincian Order</h2>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <form action="<?= base_url()?>/admin/order/update" method="post">
        <div class="form-group">
            <label for="kategori">Bayar</label>
            <input type="number" class="form-control" name="bayar" required>

        </div>
        
        
            <input type="hidden" class="form-control" value="<?= $order[0]['total']?>" name="total" required>
            <input type="hidden" class="form-control" value="<?= $order[0]['idorder']?>" name="idorder" required>
        <div class="form-group">
         <input type="submit" name="simpan" value="Simpan">
        </div>
       

        </form>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table"> 
           <tr>
            <th>NO</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
           </tr> 
           <?php $no =1; ?>
           <?php foreach ($detail as $value):  ?>
           <tr>
                <td><?=$no++?></td>
                <td><?=$value['menu']?></td>
                <td><?=$value['hargajual']?></td>
                <td><?=$value['jumlah']?></td>
                <td><?=$value['jumlah'] * $value['hargajual'];?></td>
           </tr>
           <?php endforeach; ?>
        </table>
    </div>
</div>



<?= $this->endSection() ?>