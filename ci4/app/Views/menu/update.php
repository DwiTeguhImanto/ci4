<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        echo session()->getFlashdata('info');
        echo '</div>';
    }
        
    ?>
</div>




<div class="col">
    <h3> UPDATE DATA MENU</h3>
</div>

<div class="col-8">
<form action="<?= base_url()?>/admin/menu/update" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Nama Kategori</label>
            <select class="form-control" name="idkategori" id="idkategori">
                <?php foreach ($kategori as $key => $value):  ?>
                <option <?php if ($value['idkategori'] == $menu['idkategori']) echo "selected" ?> 
                value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <div class="form-group">
        <label for="menu">Nama Menu</label>
         <input type="text" class="form-control" value="<?= $menu['menu']?>" name="menu" required>
    </div>
    
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" class="form-control" value="<?= $menu['harga']?>" name="harga" required >
    </div>

    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" class="form-control" name="gambar" >
    </div>
    <input type="hidden" class="form-control" value="<?= $menu['gambar']?>" name="gambar" required>
    <input type="hidden" class="form-control" value="<?= $menu['idmenu']?>" name="idmenu" required>

    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

</form>
</div>
<?= $this->endSection() ?>