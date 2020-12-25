<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h4 text-gray-800">Daftar Pengguna</h2><br>

    <div class="row">
        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pengguna</h6>
                </div>
                <div class="card-body">
                    <!-- <form action="<?php echo base_url() . 'AuthController/registrasi' ?>" method="POST"> -->
                    <?php echo form_open_multipart('AuthController/registrasi'); ?>
                    <div>
                        <p>Foto Profil<br>
                            <input type="file" name="foto_profil" class="form-file" style="margin-top: 5px;" required></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nama Lengkap
                                <input type="text" name="nama_user" class="form-control" placeholder="Masukkan Nama Lengkap " required>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>Username
                                <input type="text" name="username" class="form-control" placeholder="Masukkan Username " required>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Email
                                <input type="email" name="email" class="form-control" placeholder="Masukkan Email ">
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>Password
                                <input type="password" name="password" class="form-control" placeholder="Masukkan Password " required>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>No. Handphone
                                <input type="text" name="no_hp" class="form-control" placeholder="Masukkan Nomor Handphone " required>
                            </p>
                        </div>
                        <div class="col-md-6 ">
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
                                <textarea name="alamat" class="form-control"></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success col-sm-2" style="margin-top: 3%;">Simpan</button>
                    </div>
                    <?php echo form_close(); ?>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>

</div>