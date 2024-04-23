<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Master</li>
        <li><a href="<?= base_url('kategori/create'); ?>">Tambah Kategori</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="<?= base_url('kategori'); ?>" class="btn btn-light">Kembali</a>
        <a href="<?= base_url('kategori/create'); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
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
        <form action="<?= base_url('kategori/create'); ?>" method="post">
        <div class="panel-title">
          TAMBAH KATEGORI
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>
        <div class="panel-body">
          <div class="form-group <?= form_error('nama_kategori') ? 'has-error' : ''; ?>">
            <label for="nama_kategori">Kategori</label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="<?= set_value('nama_kategori'); ?>" autofocus>
            <div class="text-danger">
              <?= form_error('nama_kategori'); ?>
            </div>
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