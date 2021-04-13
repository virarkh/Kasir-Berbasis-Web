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
					<div class="row">
						<div class="col-md-6">
							Foto Profil
							<div class="input-group mb-2">
								<div class="custom-file">
									<input type="file" name="foto_profil" class="custom-file-input" id="fotoProfil" aria-describedby="descFoto">
									<label class="custom-file-label" for="fotoProfil">Choose File</label>
								</div>
							</div>
						</div>
						<!-- <p>Foto Profil<br>
							<input type="file" name="foto_profil" class="form-file" style="margin-top: 5px;" required>
						</p> -->
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
						<div class="col-md-4">
							<p>Password
								<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password " required>
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
								<input type="text" name="no_hp" class="form-control" placeholder="Masukkan Nomor Handphone " required>
							</p>
						</div>
						<div class="col-md-6 ">
							<p>
								Level
								<!-- <div class="dropdown">
								<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pilih Hak Akses
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuBotton">
									<a class="dropdown-item" value="1">Pegawai</a>
									<a class="dropdown-item" value="2">Pemilik</a>
								</div>
							</div> -->

								<select name="role_id" class="form-control">
									<option class="dropdown-item" value="" disabled selected style="display:none">Pilih Hak Akses</option>
									<option class="dropdown-item" value="1">Pegawai</option>
									<option class="dropdown-item" value="2">Pemilik</option>
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
						<!-- <button class="btn btn-success col-sm-2" style="margin-top: 3%;">Simpan</button> -->
					</div>
					<?php echo form_close(); ?>
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

	$('#fotoProfil').on('change', function() {
		// ambil nama file
		let fileName = $(this).val().split('\\').pop();
		// ubah CHOOSE FILE sesuai dengan nama file yang di upload
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});

	// $('.dropdown-toggle').dropdown()
</script>