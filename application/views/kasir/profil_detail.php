<div class="container-fluid">

  <!-- Page Heading -->
  <h2 class="h4 text-gray-800" style="text-align: center;">Profil</h2><br>

  <div class="row">
    <div class="container col-md-7" style="position: relative;">
      <div>
        <div class="card shadow">
          <div class="card-body">

            <div class="card">
              <div class="row no-gutters">
                <!-- <div class="container" style="height: 100%; display: flex; justify-content: center; align-items: center;"> -->
                <div class="col-md-4">
                  <!-- <div class="col-md-4"> -->
                  <!-- <img src="<?= base_url('assets/profil/') . $user['foto_profil'] ?>" class="card-img" style="margin-left:5%; padding-right:-5%; position:relative; top: 50%; transform: translate(0, -50%)"> -->
                  <img src="<?= base_url('assets/profil/') . $user['foto_profil'] ?>" class="card-img" style="position:relative; top: 49%; transform: translate(0, -50%)">
                  <!-- </div> -->
                </div>
                <!-- </div> -->

                <div class=" col-md-8 ">
                  <div class="card-body">
                    <h5 class="card-title" style="text-align:center; font-weight:bold"><?php echo $user['nama_user'] ?></h5>
                    <div class="card-text">
                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th><i class="far fa-user"></i>&nbsp; Username</th>
                            <td>: &nbsp; <?php echo $user['username'] ?></td>
                          </tr>
                          <tr>
                            <th><i class="far fa-envelope"></i>&nbsp; Email</th>
                            <td>: &nbsp; <?php echo $user['email'] ?></td>
                          </tr>
                          <tr>
                            <th><i class="fas fa-phone-alt"></i>&nbsp; No HP</th>
                            <td>: &nbsp; <?php echo $user['no_hp'] ?></td>
                          </tr>
                          <tr>
                            <th><i class="fas fa-house-user"></i>&nbsp; Alamat</th>
                            <td>: &nbsp; <?php echo $user['alamat'] ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <a href="<?php echo base_url('KasirController/edit') ?>" class="btn btn-primary btn-icon-split">
                      <span class="icon text-white-600">
                        <i class="fas fa-edit"></i>
                      </span>
                      <span class="text">Edit</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>