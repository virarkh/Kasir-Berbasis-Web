<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() . 'DashboardController/index' ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
          Hello
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <!-- <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url() . 'DashboardController/index' ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'TransaksiController/indexTransaksi' ?>">
          <i class="fas fa-shopping-cart"></i>
          <span>Transaksi</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'PengeluaranController/indexPengeluaran' ?>">
          <i class="fas fa-book"></i>
          <span>Pengeluaran</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'JenisPengeluaranController/indexJP' ?>">
          <i class="fas fa-tasks"></i>
          <span>Jenis Pengeluaran</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'JenisKendaraanController/indexJK' ?>">
          <i class="fas fa-truck"></i>
          <span>Jenis Kendaraan</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'DiskonController/indexDiskon' ?>">
          <i class="fas fa-star"></i>
          <span>Diskon</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'MetodeController/indexMM' ?>">
          <i class="fas fa-magic"></i>
          <span>Metode Cuci</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'AuthController/daftar' ?>">
          <i class="fas fa-user"></i>
          <span>Daftar Pengguna</span></a>
      </li>

      <hr class="sidebar-divider">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->