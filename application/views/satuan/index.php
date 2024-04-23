<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Master</li>
        <li><a href="<?= base_url('satuan'); ?>">Satuan</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="<?= base_url('satuan/create'); ?>" class="btn btn-light">Tambah</a>
        <a href="<?= base_url('satuan'); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
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
          DATA SATUAN
        </div>
        <div class="panel-body table-responsive">
          <?php if ($this->session->flashdata('success')) { ?>
            <div class="kode-alert kode-alert-icon alert3-light">
              <i class="fa fa-check"></i>
              <a href="#" class="closed">&times;</a>
              <?= $this->session->flashdata('success'); ?>
            </div>
          <?php } ?>

          <?php if ($this->session->flashdata('error')) { ?>
            <div class="kode-alert kode-alert-icon alert6-light">
              <i class="fa fa-check"></i>
              <a href="#" class="closed">&times;</a>
              <?= $this->session->flashdata('error'); ?>
            </div>
          <?php } ?>

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Satuan</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

             
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($satuans as $satuan) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $satuan->nama_satuan; ?></td>
                        <td><?= date('d-m-Y', $satuan->created_at); ?></td>
                        <td><?= date('d-m-Y', $satuan->updated_at); ?></td>
                        <td><a href="<?= base_url('satuan/edit/' . $satuan->id); ?>" class="btn btn-success btn-sm">edit</a>
                            <a href="<?= base_url('satuan/delete/' . $satuan->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data satuan ini ?')">hapus</a></td>
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