<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800" style="text-align: center;">Profil</h2><br>

    <div class="row">
        <div class="container col-md-7" style="position: relative;">
            <div>
                <div class="card shadow">
                    <div class="card-body">

                        <div class="card">
                            <div class=" row no-gutters">
                                <!-- <div class="container" style="height: 100%; display: flex; justify-content: center; align-items: center;"> -->
                                <div class="col-md-4">
                                    <!-- <div class="col-md-4"> -->
                                    <img src="<?= base_url('assets/profil/') . $user['foto_profil'] ?>" class="card-img" style="border-radius:100%; margin-left:5%; position: absolute; top: 50%; transform: translate(0, -50%)">
                                    <!-- </div> -->
                                </div>
                                <!-- </div> -->

                                <div class=" col-md-8 ">
                                    <div class="card-body">
                                        <h5 class="card-title" style="text-align:center; font-weight:bold"><?php echo $user['nama_user'] ?></h5>
                                        <div class="card-text">
                                            <table class="table">
                                                <tr>
                                                    <th><i class="far fa-user"></i></th>
                                                    <th> Username</th>
                                                    <td>:</td>
                                                    <td><?php echo $user['username'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th><i class="far fa-envelope"></i></th>
                                                    <th> Email</th>
                                                    <td>:</td>
                                                    <td><?php echo $user['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fas fa-phone-alt"></i></th>
                                                    <th> No_HP</th>
                                                    <td>:</td>
                                                    <td><?php echo $user['no_hp'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th><i class="fas fa-house-user"></i></th>
                                                    <th>Alamat</th>
                                                    <td>:</td>
                                                    <td><?php echo $user['alamat'] ?></td>
                                                </tr>
                                            </table>
                                            <!-- <i class="far fa-user"></i>&nbsp;<b>Username &emsp;&emsp;&nbsp;: </b><?php echo $user['username'] ?><br>
                                            <i class="far fa-envelope">&nbsp;</i><b>Email &emsp;&emsp;&emsp;&emsp;&nbsp;: </b><?php echo $user['email'] ?><br>
                                            <i class="fas fa-phone-alt">&nbsp;</i><b>No. Handphone : </b><?php echo $user['no_hp'] ?><br>
                                            <i class="fas fa-house-user">&nbsp;</i><b>Alamat &emsp;&emsp;&emsp;&ensp;</b>: <?php echo $user['alamat'] ?> -->
                                        </div>
                                        <a href="<?php echo base_url('KasirController/edit') ?>" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-600">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>
                                        <!-- <a href="<?php echo base_url('KasirController/edit') ?>" class="btn btn-primary">Edit</a> -->

                                        <!-- <a href="<?php echo base_url('KasirController/changePassword') ?>">Ganti Password</a> -->

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