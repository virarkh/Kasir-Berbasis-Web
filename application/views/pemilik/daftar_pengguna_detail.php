<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Daftar Pengguna</h2><br>

  <!-- Content Row -->
  <?php foreach ($user as $u) { ?>

    <div class="row">

      <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Profil</h6>
          </div>
          <div class="card-body">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?php echo base_url('./assets/profil/' . $u->foto_profil) ?>" class="card-img" style="position: relative; transform:translate(0, -50%); top:49%">
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-7">
                <h4 style="text-align: center;"><b><?php echo $u->nama_user ?></b></h4>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th><span><i class="far fa-user"></i></span>&nbsp; Username</th>
                      <td>: <?php echo $u->username ?></td>
                    </tr>
                    <tr>
                      <th><span><i class="fas fa-phone"></i></span>&nbsp; No Handphone</th>
                      <td>: <?php echo $u->no_hp ?></td>
                    </tr>
                    <tr>
                      <th><span><i class="fas fa-envelope"></i></span>&nbsp; Email</th>
                      <td>: <?php echo $u->email ?></td>
                    </tr>
                    <tr>
                      <th><span><i class="fas fa-user-tag"></i></span>&nbsp; Sebagai</th>
                      <td>:
                        <?php foreach ($role->result() as $r) : ?>
                          <?php echo $r->nama; ?>
                        <?php endforeach; ?>
                      </td>
                    </tr>
                    <tr>
                      <th><span><i class="fas fa-home"></i></span>&nbsp; Alamat</th>
                      <td>: <?php echo $u->alamat ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <a href="<?php echo base_url('AuthController/daftar') ?>" class="btn btn-secondary btn-icon-split" style="text-align:center">
              <span class="icon text-white-600">
                <i class="fas fa-chevron-left"></i>
              </span>
              <span class="text">Kembali</span>
            </a>

          </div>
        </div>
      </div>
    </div>

  <?php
  }
  ?>
</div>
<!-- /.container-fluid -->

<style>
  .table tr th {
    width: -50%;
  }
</style>