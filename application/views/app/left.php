<style>
	.left-menu{
		margin-top: 110px;
	}
	.left-menu  li{
		background-color: #34495e;
		color:#fff;
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;;
	}
	.list-group-item{
		border: none;
	}
	.list-group a .list-group-item{
		border:none;
		border-bottom: 2px solid #293a4a;
		border-radius: 0;

	}
	.list-group-item:last-child{
		border-bottom: none;
	}
	.list-group-item a{
		color:#fff;
	}
	.list-group-item:hover{
		background-color: #293a4a;
	}
	.list-group-item i{
		float: left;
		padding-right: 20px;
	}

	.list-group-item i,.list-group-item div{
		font-size: 25px;
	}
	#user{
		font-size: 25px;
		padding-left: 10px;
		padding-top: 15px;
		padding-bottom: 15px;;
		background-color: #1abc9c;
	}
	#user a{
		color:#fff;
	}
</style>


<ul class="list-group left-menu">
	<a href="<?php echo base_url('app/dashboard'); ?>">
		<li id="user">
			<div><a href="<?php echo base_url('app/dashboard'); ?>" style="padding-right: 90px;"><?php echo $userData->name ?></a><a href="<?php echo base_url('auth/logout'); ?>">Logout</a></div>
		</li>
	</a>

	<a href="<?php echo base_url('app/dashboard'); ?>">
		<li class="list-group-item">
			<i class="fui-list-bulleted"></i>
			<div>Task List</div>
		</li>
	</a>

	<a href="<?php echo base_url('app/addNewTask'); ?>">
		<li class="list-group-item">
			<i class="fui-new"></i>
			<div>Add New Task</div>
		</li>
	</a>

	<a href="<?php echo base_url('app/completedTask'); ?>">
		<li class="list-group-item">
			<i class="fui-check"></i>
			<div>Completed Task</div>
		</li>
	</a>

	<a href="#">
		<li class="list-group-item">
			<i class="fui-bookmark"></i>
			<div>Project</div>
		</li>
	</a>

	<a href="<?php echo base_url('app/settings'); ?>">
		<li class="list-group-item">
			<i class="fui-gear"></i>
			<div>Settings</div>
		</li>
	</a>
</ul>