<h2><?= $title ?></h2>
<!-- BEGIN PAGE BREADCRUMBS -->
        <ul class="page-breadcrumb breadcrumb">
            
            <li>
                <a href="<?php echo base_url(); ?>users/main">عرض المستخدمين</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="<?php echo base_url('/users/view/'.$user['u_id'].'/'.url_title(mb_substr($user['u_name'], 0, 29))); ?>">صفحة المستخدم</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>تعديل بيانات <?php echo $user['u_name']; ?> </span>
            </li>
        </ul>
<!-- END PAGE BREADCRUMBS -->
<?php echo form_open('users/update'); ?>
<input type="hidden" name="id" value="<?php echo $user['u_id']; ?>">
<div class="well">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="form-group">
				<label>الاسم</label>
				<input type="text" class="form-control"  value="<?php echo $user['u_name']; ?>" name="name" placeholder="Name">
			</div>
		
			<div class="form-group">
				<label>الايميل</label>
				<input type="email" class="form-control" value="<?php echo $user['u_email']; ?>" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label>اسم المستخدم</label>
				<input type="text" class="form-control" value="<?php echo $user['username']; ?>" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label>  رقم الجوال</label>
				<input type="text" class="form-control" value="<?php echo $user['mobile']; ?>" name="mobile" placeholder="mobile">
			</div>
			<div class="form-group">
				<label>الصلاحية </label>
		 <?php 
    		     if( $user['is_admin'] == '1') {$ISadmin = 'مسؤول';}
    			 elseif( $user['is_admin'] == '2') {$ISadmin = 'مستخدم';}
    			 else{$ISadmin ='';}
            ?>
			 <select style="height:50px;" name="isadmin" class="form-control" id="select">
				  <option value="<?php echo $user['is_admin']; ?>"><?php echo $ISadmin; ?></option>
		          <option value="1">مسؤول</option>
		          <option value="2">مستخدم</option>
		        </select>
			</div>
			<div class="form-group">
				<label>كلمة المرور</label>
				<input type="password" class="form-control" value="" name="password" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary btn-block">حفظ</button>
		</div>
	</div>
</div>	
<?php echo form_close(); ?>



