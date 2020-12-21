<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign In</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/login/Login_v11/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/Login_v11/endor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/Login_v11/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/Login_v11/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/Login_v11/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/Login_v11/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/Login_v11/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/Login_v11/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/Login_v11/css/main.css">
<!--===============================================================================================-->

<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>


</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" action="<?=site_url('AuthController/loginForm')?>" method="POST">
					<span class="login100-form-title p-b-55">
						Login
					</span>
					<b style="text-align:center"><?php echo $this->session->flashdata('msg')?></b>
					<?php echo $this->session->flashdata('notif');?>
					<div class="wrap-input100 validate-input m-b-16">
					<!-- <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz"> -->
						<input class="input100" type="text" name="username" placeholder="Username" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                        <!-- <i class="far fa-user"></i> -->
							<span class="lnr lnr-user"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					<div class="div">
						<input type="checkbox" class="form-checkbox" style="font-size:10pt"> Show password
					</div>
					
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" name="login" type="submit">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url();?>assets/login/Login_v11/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/Login_v11/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/login/Login_v11/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/Login_v11/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/Login_v11/js/main.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){		
			$('.form-checkbox').click(function(){
				if($(this).is(':checked')){
					$('.form-password').attr('type','text');
				}else{
					$('.form-password').attr('type','password');
				}
			});
		});
	</script>

</body>
</html>