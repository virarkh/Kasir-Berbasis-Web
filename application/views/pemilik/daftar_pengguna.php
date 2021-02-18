<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800">Daftar Pengguna</h2><br>

  <a href="<?php echo base_url() . 'AuthController/tambah' ?>" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-600">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data</span>
  </a>

  <!-- DataTales Example -->
  <div class="card shadow mb-4" style="margin-top: 5px;">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel User</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="text-align: center;">No</th>
              <th>Foto Profil</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($user as $u) {
            ?>
              <tr>
                <td style="text-align: center; width: 1%;"><?php echo $no++ ?></td>
                <td style="text-align: center">
                  <?php if ($u->foto_profil == '') {
                  } else { ?>
                    <img src="<?php echo base_url('./assets/profil/' . $u->foto_profil) ?>" style="width:100px; height:100px; border-radius:100%">
                </td>
              <?php } ?>
              </td>
              <!-- <td><img src="<?php echo base_url() ?>$u->foto_profil?>"></td> -->
              <td><?php echo $u->nama_user ?></td>
              <td><?php echo $u->username ?></td>
              <td><?php echo $u->nama ?></td>
              <td style="width: 35%;">
                <a href="<?php echo base_url('AuthController/detail/' . $u->id); ?>" class="btn btn-info btn-icon-split">
                  <span class="icon text-white-100">
                    <i class="fas fa-info-circle"></i>
                  </span>
                  <span class="text">Detail</span>
                </a>

                <a href="<?php echo base_url('AuthController/edit/' . $u->id); ?>" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-100">
                    <i class="fas fa-edit"></i>
                  </span>
                  <span class="text">Edit</span>
                </a>

                <a href="<?php echo base_url('AuthController/hapus/' . $u->id); ?>" class="btn btn-danger btn-icon-split">
                  <span class="icon text-white-100">
                    <i class="fas fa-trash"></i>
                  </span>
                  <span class="text">Hapus</span>
                </a>
              </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>