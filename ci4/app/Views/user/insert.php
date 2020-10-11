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
    <h3>  INSERT DATA user</h3>
</div>

<div class="col-8">
<form action="<?= base_url()?>/admin/user/insert" method="post">
    <div class="form-group">
        <label for="kategori">User</label>
         <input type="text" class="form-control" name="user" required>
    </div>
    
    <div class="form-group">
        <label for="keterangan">Email</label>
        <input type="email" class="form-control" name="email" required>
    </div>

    <div class="form-group">
        <label for="keterangan">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>

    <div class="form-group">
            <label for="">Level</label>
            <select class="form-control" name="level" id="idkategori">
                <?php foreach ($level as $key ):  ?>
                <option value="<?= $key ?>"><?= $key ?></option>
                <?php endforeach; ?>
            </select>
        </div>

    <input type="submit" name="simpan" value="Simpan">

</form>
</div>
<?= $this->endSection() ?>