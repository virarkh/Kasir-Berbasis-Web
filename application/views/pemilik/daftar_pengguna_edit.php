<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800">Daftar Pengguna</h2><br>

    <div class="row">
        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Pengguna</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($user as $u) { ?>
                        <form enctype="multipart/form-data" action="<?php echo base_url() . 'AuthController/edit_data' ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $u->id; ?>">
                            <div class="form-group">
                                <p>Foto Profil<br>
                                    <input type="file" name="foto_profil" style="margin-top: 5px;" value="<?php echo $u->foto_profil ?>" required></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Nama Lengkap
                                        <input type="text" name="nama_user" class="form-control" value="<?php echo $u->nama_user ?>" placeholder="Masukkan Nama Lengkap " required>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>Username
                                        <input type="text" name="username" class="form-control" value="<?php echo $u->username ?>" placeholder="Masukkan Username " required>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Email
                                        <input type="email" name="email" class="form-control" value="<?php echo $u->email ?>" placeholder="Masukkan Email">
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>Password
                                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>No. Handphone
                                        <input type="text" name="no_hp" class="form-control" value="<?php echo $u->no_hp ?>" placeholder="Masukkan Nomor Handphone" required>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>Level
                                        <select name="role_id" class="form-control">
                                            <option value="" disabled selected style="display:none">Pilih Hak Akses</option>
                                            <option value="1">Pemilik</option>
                                            <option value="2">Pegawai</option>
                                        </select>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Alamat
                                        <textarea name="alamat" value="<?php echo $u->alamat ?>" class="form-control"></textarea>
                                    </p>
                                </div>
                            </div>
                            <div class="text-center">

                                <button class="btn btn-success col-sm-2" style="margin-top: 3%;" type="submit">Simpan</button>
                            </div>
                        </form>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

</div>