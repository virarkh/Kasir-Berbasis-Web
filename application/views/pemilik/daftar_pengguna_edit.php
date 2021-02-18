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
                                    <input type="file" name="foto_profil" style="margin-top: 5px;" value="" required>
                                </p>
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
                                <div class="col-md-4">
                                    <p>Password
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <br>
                                        <input type="checkbox" class="custom-control-input" id="checkbox">
                                        <label class="custom-control-label" for="checkbox">Show Password</label>
                                    </div>
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
                                            <option value="1">Pegawai</option>
                                            <option value="2">Pemilik</option>
                                        </select>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Alamat
                                        <textarea name="alamat" class="form-control"><?php echo $u->alamat ?></textarea>
                                    </p>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="<?php echo base_url('AuthController/daftar') ?>" class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-600">
                                        <i class="far fa-window-close"></i>
                                    </span>
                                    <span class="text">Batal</span>
                                </a>&nbsp;
                                <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-600">
                                        <i class="far fa-check-square"></i>
                                    </span>
                                    <span class="text">Simpan</span></button>
                                <!-- <button class="btn btn-success col-sm-2" style="margin-top: 3%;" type="submit">Simpan</button> -->
                            </div>
                        </form>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        })
    })
</script>