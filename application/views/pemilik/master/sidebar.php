<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() . 'TransaksiController/indexTransaksi' ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-motorcycle"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
          Welcome
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
          <i class="fas fa-cart-plus"></i>
          <span>Transaksi</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'PengeluaranController/indexPengeluaran' ?>">
          <i class="fas fa-hand-holding-usd"></i>
          <span>Pengeluaran</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'DetailController/indexDetail' ?>">
          <i class="fas fa-receipt"></i>&nbsp;
          <span>Item Pengeluaran</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'SuppliersController/indexSup' ?>">
          <i class="fas fa-people-arrows"></i>
          <span>Suppliers</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'JenisKendaraanController/indexJK' ?>">
          <i class="fas fa-motorcycle"></i>
          <span>Jenis Kendaraan</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'DiskonController/indexDiskon' ?>">
          <i class="fas fa-percent"></i>&nbsp;
          <span>Diskon</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item" style="margin-top: -15px;">
        <a class="nav-link" href="<?php echo base_url() . 'MetodeController/indexMM' ?>">
          <i class="fas fa-hands-wash"></i>
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