<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Task</title>

	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/vendor/bootstrap.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/flat-ui.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/addNewTask.css'); ?>"/>
</head>
<body>


<div id="add-task-form">
	<form action="<?php echo base_url('app/editTaskData'); ?>" method="post">
		<div class="form-horizontal">

			<div class="form-group">
				<label for="taskName">Task Name</label>
				<input type="text" id="taskName" name="taskName" placeholder="Task Name" class="form-control" value="<?php echo $taskData->taskName;  ?>"/>
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Description for your new task"><?php echo $taskData->description; ?></textarea>
			</div>

			<input type="hidden" name="taskID" value="<?php echo $taskData->taskID; ?>"/>

			<div class="form-group">
				<input type="submit" value="Edit" class="btn btn-info btn-block"/>
			</div>
		</div>
	</form>
</div>


<script src="<?php echo base_url('public/assets/js/vendor/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/vendor/video.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/flat-ui.min.js'); ?>"></script>
</body>
</html>