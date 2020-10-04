<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="col">
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
</div>




<div class="col">
    <h3> INSERT DATA MENU</h3>
</div>

<div class="col-8">
<form action="<?= base_url()?>/admin/menu/insert" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Nama Kategori</label>
            <select class="form-control" name="idkategori" id="idkategori">
                <?php foreach ($kategori as $key => $value):  ?>
                <option value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <div class="form-group">
        <label for="menu">Nama Menu</label>
         <input type="text" class="form-control" name="menu" required>
    </div>
    
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="text" class="form-control" name="harga" required >
    </div>

    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" class="form-control" name="gambar" required>
    </div>

    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

</form>
</div>
<?= $this->endSection() ?>