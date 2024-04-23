<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Transaksi</li>
        <li><a href="<?= base_url('barang_masuk'); ?>">Barang Masuk</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
      <?php if ($profile->peran_pengguna == 'user') { ?>
        <a href="<?= base_url('barang_masuk/create'); ?>" class="btn btn-light">Tambah</a>
        <?php } ?>
        <a href="<?= base_url('barang_masuk'); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
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
          DATA BARANG MASUK
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
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>

             
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($barang_masuks as $barang_masuk) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $barang_masuk->nama_barang; ?></td>
                        <td>
                          <?php foreach ($kategoris as $kategori) { 
                             if ($kategori->id == $barang_masuk->kategori_id) {
                             echo $kategori->nama_kategori;
                             } 
                          }
                          ?></td>
                        <td>
                        <?= $barang_masuk->jumlah; ?>

                        <?php foreach ($satuans as $satuan) { 
                             if ($satuan->id == $barang_masuk->satuan_id) {
                             echo $satuan->nama_satuan;
                             } 
                          }
                          ?>
                        </td>
                        <td><?= date('d-m-Y', $barang_masuk->tanggal_masuk); ?></td>
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