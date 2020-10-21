<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/bootstrap/css/bootstrap.min.css')?>">
    <title>Admin Layout</title>
</head>
<body>

<div class="container">
    <div class="row mt-2">
        <div class="col">
            <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="<?= base_url('/admin') ?>">Admin Page</a>

            <div>
                <?php if (!empty(session()->get('user'))) {
                    echo session()->get('user');
                } ?>
            </div>

            <div>
                <?php if (!empty(session()->get('email'))) {
                    echo session()->get('email');
                } ?>
            </div>

            <div>
                <?php if (!empty(session()->get('level'))) {
                    echo session()->get('level');
                } ?>
            </div>

            </nav>
        </div>
    </div>

  <div class="row mt-2">
    <div class="col-4">
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="<?= base_url('/admin/kategori') ?>">Kategori</a></li>
                <li class="list-group-item"><a href="<?= base_url('/admin/menu') ?>">Menu</a></li>
                <li class="list-group-item"><a href="<?= base_url('/admin/pelanggan') ?>">Pelanggan</a></li>
                <li class="list-group-item"><a href="<?= base_url('/admin/order') ?>">Order</a></li>
                <li class="list-group-item"><a href="<?= base_url('/admin/orderdetail') ?>">Order Detail</a></li>
                <li class="list-group-item"><a href="<?= base_url('/admin/user') ?>">user</a></li>
            </ul>
        </div>
    </div>
    <div class="col-8 px-2">
        <?= $this->renderSection('content') ?>
    </div>
  </div>
</div>

      
</body>
</html>