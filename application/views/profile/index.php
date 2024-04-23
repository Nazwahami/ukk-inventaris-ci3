<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
      <ol class="breadcrumb">
        <li>Pengguna</li>
        <li><a href="<?= base_url('profile'); ?>">Profile</a></li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="<?= base_url('profile'); ?>" class="btn btn-light">Kembali</a>
        <a href="<?= base_url('profile'); ?>" class="btn btn-light"><i class="fa fa-refresh"></i></a>
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
        <form action="<?= base_url('profile'); ?>" method="post">
        <div class="panel-title">
          PROFILE
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

        <table class="table">
  <tbody>
    <tr>
      <th scope="row">Nama Pengguna</th>
      <td><?= $profile->nama_pengguna; ?></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><?= $profile->email; ?></td>
    </tr>
    <tr>
      <th scope="row">Peran Pengguna</th>
      <td><?= $profile->peran_pengguna; ?></td>
    </tr>
    <tr>
      <th scope="row">Created At</th>
      <td><?= date('d-m-Y', $profile->created_at); ?></td>
    </tr>
    <tr>
      <th scope="row">Updated at</th>
      <td><?= date('d-m-Y', $profile->updated_at); ?></td>
    </tr>
  </tbody>
</table>

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