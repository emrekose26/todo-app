<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=utf-8">
	<title>User Login</title>

	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/vendor/bootstrap.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/flat-ui.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/login.css'); ?>"/>

</head>
<body>

<div id="login-form">

	<form action="<?php echo base_url('auth/login'); ?>" method="post">
		<div class="form-horizontal">
			<img src="<?php echo base_url('public/assets/images/todoapp.png') ?>" alt=""/>

			<?php if($this->session->flashdata('hata')): ?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('hata'); ?>
				</div>
			<?php endif; ?>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" placeholder="Username" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" placeholder="Password" class="form-control"/>
			</div>
			<div class="form-group">
				<input type="submit" value="Login" class="btn btn-success btn-block"/>
			</div>
			<div class="form-group">
				<a href="<?php echo base_url('auth/signup');?>" class="btn btn-info btn-block">Create Account</a>
			</div>
		</div>
	</form>
</div>


	<script src="<?php echo base_url('public/assets/js/vendor/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/assets/js/vendor/video.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/assets/js/flat-ui.min.js'); ?>"></script>

</body>
</html>