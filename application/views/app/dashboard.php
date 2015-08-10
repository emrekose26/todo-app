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
		<div class="well well-sm"><h4 style="text-align: center">Your Task List</h4></div>

		<!--
		<div class="well well-sm">

			<select name="projects" id="projects">
				<?php
					foreach($projects as $rowProject){
						echo "<option value='".$rowProject['projectID']."'>".$rowProject['projectName']."</option>";
					}
				?>
			</select>
		</div>
		-->

		<?php if($numRowTaskList == 0): ?>
			<div class="alert alert-info"><h3>You have any task</h3><a href="<?php echo base_url('app/addNewTask'); ?>">Do you want a new task ? </a></div>
		<?php else: ?>
		<?php foreach($userTask as $rowTask):?>

		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<div class="caption">
					<h3><?php echo  $rowTask['taskName'];?></h3>
					<p><?php  echo  $rowTask['description'];?></p>
					<p><?php  echo  $rowTask['taskTime']; ?></p>
					<p><?php  echo  $rowTask['condition'] == '0' ? "<label class='label label-danger'>Uncompleted</label>" : "<label class='label label-success'>Completed</label>"; ?></p>
					<p><a href="<?php echo base_url('app/taskUpdate/'.$rowTask['taskID'].'/1'); ?>" class="btn btn-success" role="button">Complete</a> <a href="<?php echo base_url('app/editTask/'.$rowTask['taskID'].''); ?>" class="btn btn-info" role="button">Edit</a> <a href="<?php echo base_url('app/deleteTask/'.$rowTask['taskID'].'') ?>" class="btn btn-danger" role="button">Delete</a></p>
				</div>
			</div>
			</div>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>



	<script src="<?php echo base_url('public/assets/js/vendor/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/assets/js/vendor/video.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/assets/js/flat-ui.min.js'); ?>"></script>
	<script>
		$(function(){
			$('#projects').change(function(){
				var projectVal = $(this).val();
				$.ajax({
					type    : "POST",
					url     : "<?php echo base_url('app/ajaxProject'); ?>",
					data    :"projectID="+projectVal,
					dataType:'json',
					success: function(req){
						$('.alert-info').html(req['taskName']);
					}
				})
			});
		});
	</script>
</body>
</html>