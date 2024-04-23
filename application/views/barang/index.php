<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Master</li>
        <li><a href="<?= base_url('barang'); ?>">Barang</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
      <?php if ($profile->peran_pengguna == 'user') { ?>
        <a href="<?= base_url('barang/create'); ?>" class="btn btn-light">Tambah</a>
        <?php } ?>
        <a href="<?= base_url('barang'); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
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
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          DATA BARANG
        </div>
        <div class="panel-body table-responsive">
          <?php if ($this->session->flashdata('success')) { ?>
            <div class="kode-alert kode-alert-icon alert3-light">
              <i class="fa fa-check"></i>
              <a href="#" class="closed">&times;</a>
              <?= $this->session->flashdata('success'); ?>
            </div>
          <?php } ?>

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <?php if ($profile->peran_pengguna == 'user') { ?>
                        <th>Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>

             
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($barangs as $barang) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $barang->nama_barang; ?></td>
                        <td><?= $barang->merk; ?></td>
                        <td><?= $barang->nama_kategori; ?></td>
                        <td><?= $barang->stok . " " .$barang->nama_satuan; ?></td>
                        <?php if ($profile->peran_pengguna == 'user') { ?>
                        <td>
                        <a href="<?= base_url('barang/edit/' . $barang->id); ?>" class="btn btn-success btn-sm">edit</a>
                        <a href="<?= base_url('barang/delete/' . $barang->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')">hapus</a></td>
                        <?php } ?>
                      </tr>
                    <?php } ?>
                </tbody>
            </table>


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