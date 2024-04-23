<!-- START SIDEBAR -->
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">MAIN</li>
  <li><a href="<?= base_url('dashboard'); ?>" class="<?= $judul == 'Dashboard' ? 'active' : ''; ?>"><span class="icon color5"><i class="fa fa-tachometer"></i></span>Dashboard</a></li>
  <li><a href="<?= base_url('profile'); ?>" class="<?= $judul == 'Profile' ? 'active' : ''; ?>"><span class="icon color5"><i class="fa fa-user-md"></i></span>Profile</a></li>
</ul>

<ul class="sidebar-panel nav">
  <li class="sidetitle">DATA</li>
  <?php if ($profile->peran_pengguna == 'user') { ?>
  <li>
    <a href="<?= base_url('satuan'); ?>" class="<?= $judul == 'Data Satuan' || $judul == 'Tambah Satuan' || $judul == 'Edit Satuan' ? 'active' : ''; ?>">
    <span class="icon color15"><i class="fa fa-th-list"></i></span>Satuan
  </a>
  </li>
  <li><a href="<?= base_url('kategori'); ?>" class="<?= $judul == 'Data Kategori' || $judul == 'Tambah Kategori' || $judul == 'Edit Kategori' ? 'active' : ''; ?>">
    <span class="icon color7"><i class="fa fa-th-large"></i></span>
    Kategori</a>
  </li>
  <?php } ?>
  <li><a href="<?= base_url('barang'); ?>" class="<?= $judul == 'Data Barang' || $judul == 'Tambah Barang' || $judul == 'Edit Barang' ? 'active' : ''; ?>">
    <span class="icon color10"><i class="fa fa-list-ul"></i></span>Barang</a>
  </li>
</ul>


<ul class="sidebar-panel nav">
  <li class="sidetitle">Transaksi</li>
  <?php if ($profile->peran_pengguna == 'user' || $profile->peran_pengguna == 'manajemen') { ?>
  <li><a href="<?= base_url('barang_masuk'); ?>" class="<?= $judul == 'Data Barang Masuk' || $judul == 'Tambah Barang Masuk' || $judul == 'Edit Barang Masuk' ? 'active' : ''; ?>">
  <span class="icon color15"><i class="fa fa-shopping-cart"></i></span>Barang Masuk</a></li>
  <li><a href="<?= base_url('barang_keluar'); ?>" class="<?= $judul == 'Data Barang Keluar' ? 'active' : ''; ?>"><span class="icon color7"><i class="fa fa-shopping-cart"></i></span>Barang_Keluar</a></li>
  <?php } ?>
  <?php if ($profile->peran_pengguna == 'user' || $profile->peran_pengguna == 'anggota') { ?>
  <li><a href="<?= base_url('pengajuan'); ?>" class="<?= $judul == 'Data Pengajuan' ? 'active' : ''; ?>"><span class="icon color10"><i class="fa fa-shopping-cart"></i></span>Pengajuan</a></li>
    <?php } ?>
</ul>


<?php if ($profile->peran_pengguna == 'user') { ?>
<ul class="sidebar-panel nav">
  <li class="sidetitle">PENGGUNA</li>
  <li><a href="<?= base_url('peran_pengguna'); ?>" class="<?= $judul == 'Data Peran Pengguna' ? 'active' : ''; ?>">
  <span class="icon color15"><i class="fa fa-edit"></i></span>Peran Pengguna</a></li>
  <li><a href="<?= base_url('pengguna'); ?>" class="<?= $judul == 'Data Pengguna' || $judul == 'Tambah Pengguna' || $judul == 'Edit Pengguna' ? 'active' : ''; ?>">
  <span class="icon color7"><i class="fa fa-users"></i></span>Pengguna</a></li>
</ul>
<?php } ?>

<ul class="sidebar-panel nav">
  <li><a href="<?= base_url('auth/logout'); ?>" onclick="return confirm('yakin anda akam logout ?');">
  <span class="icon color15"><i class="fa falist fa-power-off"></i></span>Logout</a></li>
</ul>


</div>
<!-- END SIDEBAR -->