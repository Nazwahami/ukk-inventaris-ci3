<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Transaksi</li>
        <li><a href="<?= base_url('barang_keluar'); ?>">Barang Keluar</a></li>
</ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="<?= base_url('barang_keluar'); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
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
          DATA BARANG KELUAR
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Pengguna</th>
                        <?php if ($profile->peran_pengguna == 'user') { ?>
                        <?php } ?>
                    </tr>
                </thead>

             
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($barang_keluars as $barang_keluar) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $barang_keluar->nama_barang; ?></td>
                       <td><?= $barang_keluar->jumlah; ?>

                        <?php foreach ($satuans as $satuan) { 
                             if ($satuan->id == $barang_keluar->satuan_id) {
                             echo $satuan->nama_satuan;
                             } 
                          }
                          ?></td>
                          <td>
                            <button class="btn btn-warning btn-sm btn-rounded">
                            <?= $barang_keluar->status; ?>
                            </button>
                          </td>
                        <td><?= date('d-m-Y', $barang_keluar->tanggal_pengajuan); ?></td>
                        <td><?= $barang_keluar->nama_pengguna; ?></td>
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