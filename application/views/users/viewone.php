<div class="well">
	<div class="row">
		<div class="col-md-6">
			
		</div>
		<div class="col-md-6">
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
		<a class="btn btn-default pull-right" href="<?php echo base_url(); ?>users/edit/<?php echo $user['u_id']; ?>">تعديل</a>	
		</div>
		<div class="col-md-3">
		<a onclick="return confirm('Are you sure? Delete <?php echo $user['u_name']; ?>')" class="btn btn-danger pull-right" href="<?php echo base_url(); ?>users/delete/<?php echo $user['u_id']; ?>">حذف</a>	
		</div>
		
	</div>
	
<div class="row">
		<div class="col-md-9">
		<br><br>
			<div class="post-body">
				<?php echo $user['u_id']; ?><br>
				<?php echo $user['u_name']; ?><br>
				<?php echo $user['u_email']; ?><br>
				<?php echo $user['username']; ?><br>
				<?php echo $user['password']; ?><br>
			</div>	
		</div>
		<div class="col-md-3">
			
		</div>
	</div>



</div>
