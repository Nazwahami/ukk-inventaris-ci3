<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>LOGIN</title>

  <!-- ========== Css Files ========== -->
  <link href="<?= base_url('assets/'); ?>css/root.css" rel="stylesheet">
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>

    <div class="login-form">
      <form action="<?= base_url('auth/login'); ?>" method="post">
        <div class="top">
          <h1>INVENTARIS</h1>
          <h4>Inventaris Barang</h4>
        </div>
        <div class="form-area">
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="kode-alert kode-alert-icon alert6-light">
              <i class="fa fa-check"></i>
              <a href="#" class="closed">&times;</a>
              <?= $this->session->flashdata('error'); ?>
            </div>
          <?php } ?>

          <?php if ($this->session->flashdata('success')) { ?>
            <div class="kode-alert kode-alert-icon alert3-light">
              <i class="fa fa-check"></i>
              <a href="#" class="closed">&times;</a>
              <?= $this->session->flashdata('success'); ?>
            </div>
          <?php } ?>
          <div class="group <?= form_error('email') ? 'has-error' : ''; ?>">
            <input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Email">
            <i class="fa fa-envelope-o"></i>
            <div class="text-danger">
                <?= form_error('email'); ?>
            </div>
          </div>
          <div class="group <?= form_error('password') ? 'has-error' : ''; ?>">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <i class="fa fa-key"></i>
            <div class="text-danger">
                <?= form_error('password'); ?>
            </div>
          </div>
          <button type="submit" class="btn btn-default btn-block">LOGIN</button>
        </div>
      </form>
    </div>

</body>
</html>