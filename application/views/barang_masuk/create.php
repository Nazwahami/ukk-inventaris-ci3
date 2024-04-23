<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Transaksi</li>
        <li><a href="<?= base_url('barang_masuk/create'); ?>">Tambah Barang Masuk</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="<?= base_url('barang_masuk'); ?>" class="btn btn-light">Kembali</a>
        <a href="<?= base_url('barang_masuk/create'); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
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
        <form action="<?= base_url('barang_masuk/create'); ?>" method="post">
        <div class="panel-title">
          TAMBAH BARANG MASUK
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-body">
          <div class="form-group <?= form_error('barang_id') ? 'has-error' : ''; ?>">
            <label for="barang_id">Nama Barang</label>
            <select name="barang_id" id="barang_id" class="form-control selectpicker" data-live-search="true">
              <option value="">Pilih Barang</option>
              <?php foreach ($barangs as $barang) { ?>
                  <option value="<?= $barang->id; ?>"<?= set_value('barang_id') == $barang->id ? 'selected' : ''; ?>><?= $barang->nama_barang . " (" . $barang->stok . " " . $barang->nama_satuan . ")"; ?></option>
              <?php } ?>
              </select>
            <div class="text-danger">
              <?= form_error('barang_id'); ?>
            </div>
          </div>
        </div>

          <div class="form-group <?= form_error('jumlah') ? 'has-error' : ''; ?>">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?= set_value('jumlah'); ?>">
            <div class="text-danger">
              <?= form_error('jumlah'); ?>
            </div>
          </div>

          <div class="form-group <?= form_error('tanggal_masuk') ? 'has-error' : ''; ?>">
            <label for="tanggal_masuk">Tangal Masuk</label>
            <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="<?= set_value('tanggal_masuk'); ?>">
            <div class="text-danger">
              <?= form_error('tanggal_masuk'); ?>
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