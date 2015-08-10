<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Settings</title>

	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/vendor/bootstrap.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/flat-ui.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/addNewTask.css'); ?>"/>

</head>
<body>


<div id="add-task-form">
	<form action="<?php echo base_url('app/set_settings'); ?>" method="post">
		<div class="form-horizontal">

			<div class="form-group">
				<label for="username">User Name</label>
				<input type="text" id="username" name="username" placeholder="User Name" class="form-control" value="<?php echo $userData->userName;  ?>"/>
			</div>

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" placeholder="Name" class="form-control" value="<?php echo $userData->name;  ?>"/>
			</div>

			<div class="form-group">
				<label for="">İf you want to change your password => </label>
				<a href="#" class="btn btn-default click">Click here</a>
			</div>
			<div class="form-group password-field">
				<label for="name">Password</label>
				<input type="text" id="password" name="password" placeholder="Password" class="form-control" />
			</div>

			<input type="hidden" name="userID" value="<?php echo $userData->userID ?>"/>

			<div class="form-group">
				<input type="submit" value="Update" class="btn btn-info btn-block"/>
			</div>
		</div>
	</form>
</div>


<script src="<?php echo base_url('public/assets/js/vendor/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/vendor/video.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/flat-ui.min.js'); ?>"></script>
<script>
	$(function(){
		$('.password-field').hide();
		$('.click').click(function(){
			$('.password-field').show();
		});
	});
</script>
</body>
</html>