<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- <?php
            if ($this->session->flashdata('sukses')) {
              echo "<br/>" . "<div class='alert-success'>" . $this->session->flashdata('sukses') . "</div>";
            }
            ?> -->
      <div style="margin-top: 1%;">
        <?= $this->session->flashdata('message'); ?>
      </div>


      <div style="margin-top: 1%;">
        <?php $this->view('pemilik/message_success.php') ?>
      </div>

      <div style="margin-top: 1%;">
        <?php $this->view('pemilik/message_delete.php') ?>
      </div>




      <!-- <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <i class="icon fa fa-check"></i>
        <?php echo $this->session->flashdata('success'); ?>
      </div> -->



      <!-- <h4>Tik Tok</h4> -->
      <!-- <img src="<?php echo base_url() ?>assets/icon/home-page.png"> -->

      <!-- Sidebar Toggle (Topbar) -->
      <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button> -->

      <!-- Topbar Search -->
      <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
      <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
    </form> -->


      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
              <!-- Rokhmah Vira Santi -->
              <div>
                <?php echo $this->session->userdata('username'); ?>
              </div>
            </span>
            <i class="fas fa-user-circle"></i>
            <!-- <img src="<?php echo base_url() ?>assets/icon/exit.png"> -->
            <!-- <img src="<?php echo $this->session->userdata('foto_profil'); ?>"> -->
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->