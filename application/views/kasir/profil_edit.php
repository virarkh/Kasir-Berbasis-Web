<div class="container-fluid">

	<!-- Page Heading -->
	<h2 class="h4 text-gray-800" style="text-align: center;">Profil</h2><br>

	<div class="row">
		<div class="container col-md-6" style="position: relative;">
			<div>
				<div class="card shadow">
					<div class="card-body">

						<?= form_open_multipart('KasirController/edit') ?>
						<div class="form-group row">
							<label for="fullname" class="col-sm-3 col-form-label">Nama Lengkap</label>
							<div class="col-sm-9">
								<input type="text" name="nama_user" class="form-control" id="fullname" placeholder="Nama Lengkap" value="<?php echo $user['nama_user'] ?>" required>
							</div>
						</div>

						<div class="form-group row">
							<label for="username" class="col-sm-3 col-form-label">Username</label>
							<div class="col-sm-9">
								<input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo $user['username'] ?>" readonly>
							</div>
						</div>

						<div class=" form-group row">
							<label for="email" class="col-sm-3 col-form-label">Email</label>
							<div class="col-sm-9">
								<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $user['email'] ?>">
							</div>
						</div>

						<div class=" form-group row">
							<label for="no_hp" class="col-sm-3 col-form-label">No Handphone</label>
							<div class="col-sm-9">
								<input type="text" name="no_hp" class="form-control" id="ho_hp" placeholder="No. Handphone" value="<?php echo $user['no_hp'] ?>" required>
							</div>
						</div>

						<div class=" form-group row">
							<label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
							<div class="col-sm-9">
								<textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" required><?php echo $user['alamat'] ?></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label for="foto_profil" class="col-sm-3 col-form-label">Foto Profil</label>
							<div class="col-sm-9">
								<div class="row">
									<div class="col-sm-3">
										<img src="<?php echo base_url('assets/profil/') . $user['foto_profil'] ?>" class="img-thumbnail">
									</div>
									<div class="col-sm-9">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="fotoProfile" aria-describedby="descFoto" name="foto_profil">
											<label class="custom-file-label" for="fotoProfile">Choose File</label>
										</div>

										<!-- <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="foto_profil">
                                            <label class="custom-file-label" for="image">Choose File</label>

                                        </div> -->
									</div>
								</div>
							</div>
						</div>

						<div class="form-group row justify-content-end">
							<div class="col-sm-9">
								<a href="<?php echo base_url('KasirController/profil') ?>" class="btn btn-secondary btn-icon-split">
									<span class="icon text-white-600">
										<i class="far fa-window-close"></i>
									</span>
									<span class="text">Batal</span>
								</a>&nbsp;
								<button type="submit" class="btn btn-primary btn-icon-split"><span class="icon text-white-600">
										<i class="fas fa-edit"></i>
									</span>
									<span class="text">Edit</span></button>
							</div>
						</div>

						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	// $('.custom-file-input').on('change', function() {
	// 	let fileName = $($this).val().split('\\').pop();
	// 	$(this).next('.custom-file-label').addClass("selected").html(fileName);
	// });

	$('#fotoProfile').on('change', function() {
		// ambil nama file
		let fileName = $(this).val().split('\\').pop();
		// ubah CHOOSE FILE sesuai dengan nama file yang di upload
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
</script>