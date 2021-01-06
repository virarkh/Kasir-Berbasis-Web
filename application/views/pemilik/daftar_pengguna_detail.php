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
            <table class="table-responsive">
              <tr>
                <th><span><i class="far fa-address-card"></i></span>&nbsp; Nama</th>
                <td></td>
                <td>:</td>
                <td></td>
                <td><?php echo $u->nama_user ?></td>
              </tr>
              <tr>
                <th><span><i class="far fa-user"></i></span>&nbsp; Username</th>
                <td></td>
                <td>:</td>
                <td></td>
                <td><?php echo $u->username ?></td>
              </tr>
              <tr>
                <th><span><i class="fas fa-phone"></i></span>&nbsp; No Handphone</th>
                <td></td>
                <td>:</td>
                <td></td>
                <td><?php echo $u->no_hp ?></td>
              </tr>
              <tr>
                <th><span><i class="fas fa-envelope"></i></span>&nbsp; Email</th>
                <td></td>
                <td>:</td>
                <td></td>
                <td><?php echo $u->email ?></td>
              </tr>
              <tr>
                <th><span><i class="fas fa-user-tag"></i></span>&nbsp; Sebagai</th>
                <td></td>
                <td>:</td>
                <td></td>
                <td>
                  <?php foreach ($role->result() as $r) : ?>
                    <?php echo $r->nama; ?>
                  <?php endforeach; ?>
                </td>
              </tr>
              <tr>
                <th><span><i class="fas fa-home"></i></span>&nbsp; Alamat</th>
                <td></td>
                <td>:</td>
                <td></td>
                <td><?php echo $u->alamat ?></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <tr>

                <!-- <td colspan="5"><a href="<?php echo base_url('AuthController/daftar'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a></td> -->
              </tr>
            </table>
            <a href="<?php echo base_url('AuthController/daftar') ?>" class="btn btn-secondary btn-icon-split" style="margin-top: 2%;">
              <span class="icon text-white-600">
                <i class="fas fa-chevron-left"></i>
              </span>
              <span class="text">Kembali</span>
            </a>

          </div>
        </div>
      </div>

      <!-- Donut Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Foto Profil</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <img src="<?php echo base_url('./assets/profil/' . $u->foto_profil) ?>" style="width: 80%; height:80%; border-radius:100%; display:block; margin:auto">
          </div>
        </div>
      </div>
    </div>

  <?php
  }
  ?>
</div>
<!-- /.container-fluid -->