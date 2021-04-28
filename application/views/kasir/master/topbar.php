<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <a href="<?php echo base_url() ?>KasirController/indexKasir" title="Home" class="nav-link">
        <i class="fas fa-home"></i><span>&nbsp;Home</span>
      </a>
      <a href="<?php echo base_url() ?>KasirController/profil" title="Profile" class="nav-link">
        <i class="fas fa-user-alt"></i><span>&nbsp;Profile</span>
      </a>

      &ensp;&ensp;

      <div style="margin-top: 1%;">
        <?= $this->session->flashdata('message'); ?>
      </div>

      <div style="margin-top: 1%;">
        <?php $this->view('pemilik/message_success.php') ?>
      </div>


      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('username') ?></span>
            <!-- <img class="img-profile rounded-circle" src="<?= base_url('assets/profil/') . $user['foto_profil']; ?>"> -->


            <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">
              <div>
                <?php echo $this->session->userdata('username'); ?>
              </div>
            </span> -->
            <i class="fas fa-user-circle"></i>
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Keluar
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->