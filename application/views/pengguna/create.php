<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Pengguna</li>
        <li><a href="<?= base_url('pengguna/create'); ?>">Tambah Pengguna</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="<?= base_url('pengguna'); ?>" class="btn btn-light">Kembali</a>
        <a href="<?= base_url('pengguna/create'); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-12 col-lg-6">
      <div class="panel panel-default">
        <form action="<?= base_url('pengguna/create'); ?>" method="post">
        <div class="panel-title">
          TAMBAH PENGGUNA
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-body">
          <div class="form-group <?= form_error('nama_pengguna') ? 'has-error' : ''; ?>">
            <label for="nama_pengguna">Nama Pengguna</label>
            <input type="text" class="form-control" name="nama_pengguna" id="nama_pengguna" value="<?= set_value('nama_pengguna'); ?>" autofocus>
            <div class="text-danger">
              <?= form_error('nama_pengguna'); ?>
            </div>
          </div>
        </div>

          <div class="form-group <?= form_error('email') ? 'has-error' : ''; ?>">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>">
            <div class="text-danger">
              <?= form_error('email'); ?>
            </div>
          </div>

          <div class="form-group <?= form_error('password') ? 'has-error' : ''; ?>">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password'); ?>">
            <div class="text-danger">
              <?= form_error('password'); ?>
            </div>
          </div>
            

        <div class="panel-footer text-right">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        </form>
      </div>
    </div>
    <!-- End Panel -->
  </div>
  <!-- End Row -->






</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 




</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 