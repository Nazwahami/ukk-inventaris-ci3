<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Transaksi</li>
        <li><a href="<?= base_url('pengajuan'); ?>">Pengajuan</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
      <?php if ($profile->peran_pengguna == 'anggota') { ?>
        <a href="<?= base_url('pengajuan/create/'); ?>" class="btn btn-light">Tambah</a>
        <?php } ?>
        <a href="<?= base_url('pengajuan'); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
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
          DATA PENGAJUAN
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
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Pengguna</th>
                        <?php if ($profile->peran_pengguna == 'user') { ?>
                        <th>Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>

             
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($pengajuans as $pengajuan) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pengajuan->nama_barang; ?></td>
                       <td><?= $pengajuan->jumlah; ?>

                        <?php foreach ($satuans as $satuan) { 
                             if ($satuan->id == $pengajuan->satuan_id) {
                             echo $satuan->nama_satuan;
                             } 
                          }
                          ?></td>
                          <td>
                            <button class="btn btn-warning btn-sm btn-rounded">
                            <?= $pengajuan->status; ?>
                            </button>
                          </td>
                        <td><?= date('d-m-Y', $pengajuan->tanggal_pengajuan); ?></td>
                        <td><?= $pengajuan->nama_pengguna; ?></td>
                        <?php if ($profile->peran_pengguna == 'user' and $pengajuan->status == 'pending') { ?>
                        <td>
                        <a href="<?= base_url('pengajuan/disetujui/' . $pengajuan->id); ?>" class="btn btn-success">Disetujui</a></td>
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