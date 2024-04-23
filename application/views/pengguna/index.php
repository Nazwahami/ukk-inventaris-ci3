<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Pengguna</li>
        <li><a href="<?= base_url('pengguna'); ?>">Pengguna</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="<?= base_url('pengguna/create'); ?>" class="btn btn-light">Tambah</a>
        <a href="<?= base_url('pengguna'); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
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
          DATA PENGGUNAA
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
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Peran Pengguna</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

             
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($penggunas as $pengguna) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pengguna->nama_pengguna; ?></td>
                        <td><?= $pengguna->email; ?></td>
                        <td><?= $pengguna->peran_pengguna; ?></td>
                        <td><?= date('d-m-Y', $pengguna->created_at); ?></td>
                        <td><?= date('d-m-Y', $pengguna->updated_at); ?></td>
                        <td>
                        <a href="<?= base_url('pengguna/edit/' . $pengguna->id); ?>" class="btn btn-success btn-sm">edit</a>
                        <a href="<?= base_url('pengguna/delete/' . $pengguna->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data ini ?')">hapus</a></td>
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