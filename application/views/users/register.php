<h1 class="text-center"><?= $title; ?></h1>
<div class="well content">
<?php echo form_open('users/register'); ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="form-group">
				<label>الاسم</label>
				<input type="text" class="form-control" value="<?php echo set_value('name'); ?>" name="name" placeholder="Name">
			</div>
		
			<div class="form-group">
				<label>الايميل</label>
				<input type="email" class="form-control" value="<?php echo set_value('email'); ?>" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label>اسم المستخدم</label>
				<input type="text" class="form-control" value="<?php echo set_value('username'); ?>" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label>  رقم الجوال</label>
				<input type="text" class="form-control" value="<?php echo set_value('mobile'); ?>" name="mobile" placeholder="mobile">
			</div>
			<div class="form-group">
				<label>الصلاحية </label>
				<select style="height:50px;" name="isadmin" class="form-control" id="select">
				  <option></option>
		          <option value="1">مسؤول</option>
		          <option value="2">مستخدم</option>
		        </select>
			</div>
			<div class="form-group">
				<label>كلمة المرور</label>
				<input type="password" class="form-control" value="<?php echo set_value('password'); ?>" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<label>تأكيد كلمة المرور</label>
				<input type="password" class="form-control" value="<?php echo set_value('password2'); ?>" name="password2" placeholder="Confirm Password">
			</div>
			<button type="submit" class="btn btn-primary btn-block">إضافة المستخدم</button>
		</div>
	</div>
<?php echo form_close(); ?>
</div>