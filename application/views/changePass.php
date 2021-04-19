<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?php echo base_url() ?>assets/logo.png" type="image/png" />
	<title>Reset Password</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url(); ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url(); ?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-md-5">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
							<div class="col">
								<div class=" p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900">Ubah Password</h1>
										<h6 class="mb-4"><?= $this->session->userdata('reset_email') ?></h6>
									</div>

									<?= $this->session->flashdata('message'); ?>
									<form class="user" action="<?= base_url('AuthController/changePassword') ?>" method="POST">
										<div class="form-group">
											<input type="password" name="password1" id="password1" class="form-control form-control-user" placeholder="Password Baru">
											<?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
										</div>
										<div class="form-group">
											<input type="password" name="password2" id="password2" class="form-control form-control-user" placeholder="Ulangi Password Baru">
											<?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="checkbox">
												<label class="custom-control-label" for="checkbox">Show Password</label>
											</div>
										</div>
										<button class="btn btn-primary btn-user btn-block" type="submit">
											Ubah Password
										</button>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="<?php echo base_url('AuthController/index') ?>">Login ?</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url(); ?>assets/admin/js/sb-admin-2.min.js"></script>

	<script>
		$(document).ready(function() {
			$(' #checkbox').click(function() {
				if ($(this).is(':checked')) {
					$('#password2').attr('type', 'text');
				} else {
					$('#password2').attr('type', 'password');
				}
			})
		})
	</script>

</body>

</html>