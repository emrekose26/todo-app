<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add New Task</title>

	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/vendor/bootstrap.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/flat-ui.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/addNewTask.css'); ?>"/>
</head>
<body>

	<div id="add-task-form">
	<form action="<?php echo base_url('app/addNewTask'); ?>" method="post">
		<div class="form-horizontal">

			<div class="form-group">
				<label for="taskName">Task Name</label>
				<input type="text" id="taskName" name="taskName" placeholder="Task Name" class="form-control"/>
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Description for your new task"></textarea>
			</div>

			<div class="form-group">
				<input type="submit" value="Save" class="btn btn-success btn-block"/>
			</div>
		</div>
	</form>
	</div>


	<script src="<?php echo base_url('public/assets/js/vendor/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/assets/js/vendor/video.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/assets/js/flat-ui.min.js'); ?>"></script>
</body>
</html>