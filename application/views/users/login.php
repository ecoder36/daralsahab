<?php echo form_open('users/login'); ?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="well auth-content">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
			</div>
			<!--<div class="form-group">-->
				<!--<a href="<?php //echo base_url(); ?>users/ResetPassword">نسيت كلمة المرور</a>	-->
			<!--</div>-->
			<button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>
			</div>
		</div>
	</div>
	<div class="text-center">
	<a href="index.html" class="btn btn-default btn-sm" id="back-btn"><b>
	     رجوع &nbsp;&nbsp;<i class="fa fa-arrow-left"></i></b></a>
	</div>
<?php echo form_close(); ?>