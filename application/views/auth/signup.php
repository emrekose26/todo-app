<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=utf-8">
	<title>Sign Up</title>

	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/vendor/bootstrap.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/flat-ui.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/signup.css'); ?>"/>

</head>
<body>

<div id="signup-form">

	<form action="<?php echo base_url('auth/signup'); ?>" method="post">
		<div class="form-horizontal">
			<img src="<?php echo base_url('public/assets/images/todoapp.png') ?>" alt=""/>

			<div class="form-group">
				<label for="username">Name</label>
				<input type="text" id="name" name="name" placeholder="Name" class="form-control"/>
			</div>

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" placeholder="Username" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" placeholder="Password" class="form-control"/>
			</div>
			<div class="form-group">
				<input type="submit" value="Create Account" class="btn btn-success btn-block"/>
			</div>

		</div>
	</form>
</div>


<script src="<?php echo base_url('public/assets/js/vendor/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/vendor/video.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/flat-ui.min.js'); ?>"></script>

</body>
</html>