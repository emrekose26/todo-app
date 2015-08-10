<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>.::TODO List App::.</title>

	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/vendor/bootstrap.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/flat-ui.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/dashboard.css'); ?>"/>


</head>
<body>


<div class="pull-left col-md-3">
	<?php include 'application/views/app/left.php'; ?>
</div>


<div class="pull-right col-md-9">
	<div class="well well-sm"><h4 style="text-align: center">Your Completed Task List</h4></div>
	<?php foreach($completedTask as $rowTask):?>

		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<div class="caption">
					<h3><?php echo  $rowTask['taskName'];?></h3>
					<p><?php  echo  $rowTask['description'];?></p>
					<p><?php  echo  $rowTask['taskTime']; ?></p>
					<p><?php  echo  $rowTask['condition'] == '0' ? "<label class='label label-danger'>Uncompleted</label>" : "<label class='label label-success'>Completed</label>"; ?></p>
					<p> <a href="<?php echo base_url('app/taskUpdate/'.$rowTask['taskID'].'/0'); ?>" class="btn btn-info" role="button">Undo</a></p>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>



<script src="<?php echo base_url('public/assets/js/vendor/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/vendor/video.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/flat-ui.min.js'); ?>"></script>
</body>
</html>