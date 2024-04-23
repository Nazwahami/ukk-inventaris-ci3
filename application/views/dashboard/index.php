<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Main</li>
        <li><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="<?= base_url('dashboard'); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
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
    <div class="col-md-4 col-lg-3">
      <div class="panel panel-default">
        <div class="panel-title">
          DATA SATUAN
        </div>
        <div class="panel-body" style="font-size: 50px; padding: 20px 10px;">
          <?= $count_satuan; ?>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-lg-3">
      <div class="panel panel-default">
        <div class="panel-title">
          DATA KATEGORI
        </div>
        <div class="panel-body" style="font-size: 50px; padding: 20px 10px;">
          <?= $count_kategori; ?>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-lg-3">
      <div class="panel panel-default">
        <div class="panel-title">
          DATA BARANG
        </div>
        <div class="panel-body" style="font-size: 50px; padding: 20px 10px;">
          <?= $count_barang; ?>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-lg-3">
      <div class="panel panel-default">
        <div class="panel-title">
          DATA PENGGUNA
        </div>
        <div class="panel-body" style="font-size: 50px; padding: 20px 10px;">
          <?= $count_pengguna; ?>
        </div>
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