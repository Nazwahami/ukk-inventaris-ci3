<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Master</li>
        <li><a href="<?= base_url('barang/edit/' .$barang->id); ?>">Edit Barang</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="<?= base_url('barang'); ?>" class="btn btn-light">Kembali</a>
        <a href="<?= base_url('barang/edit/' .$barang->id); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
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
        <form action="<?= base_url('barang/edit/' .$barang->id); ?>" method="post">
        <div class="panel-title">
          EDIT BARANG
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <div class="panel-body">
          <div class="form-group <?= form_error('nama_barang') ? 'has-error' : ''; ?>">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= set_value('nama_barang', $barang->nama_barang); ?>" autofocus>
            <div class="text-danger">
              <?= form_error('nama_barang'); ?>
            </div>
          </div>
        </div>

          <div class="form-group <?= form_error('merk') ? 'has-error' : ''; ?>">
            <label for="merk">Merk</label>
            <input type="text" class="form-control" name="merk" id="merk" value="<?= set_value('merk', $barang->merk); ?>">
            <div class="text-danger">
              <?= form_error('merk'); ?>
            </div>
          </div>

          <div class="form-group <?= form_error('kategori_id') ? 'has-error' : ''; ?>">
            <label for="kategori_id">Kategori</label>
            <select class="form-control selectpicker" name="kategori_id" id="kategori_id" data-live-search="true">
              <option value="">Pilih Kategori</option>
              <?php foreach ($kategoris as $kategori) { ?>
                <option value="<?= $kategori->id; ?>" <?= set_value('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '';?>>
                  <?= $kategori->nama_kategori; ?></option>
              <?php } ?>
            </select>
            <div class="text-danger">
              <?= form_error('kategori_id'); ?>
            </div>

          <div class="form-group <?= form_error('satuan_id') ? 'has-error' : ''; ?>">
            <label for="satuan_id">Satuan</label>
            <select class="form-control selectpicker" name="satuan_id" id="satuan_id" data-live-search="true">
              <option value="">Pilih Satuan</option>
              <?php foreach ($satuans as $satuan) { ?>
                <option value="<?= $satuan->id; ?>" <?= set_value('satuan_id', $barang->satuan_id) == $satuan->id ? 'selected' : '';?>>
                  <?= $satuan->nama_satuan; ?></option>
              <?php } ?>
            </select>
            <div class="text-danger">
              <?= form_error('satuan_id'); ?>
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