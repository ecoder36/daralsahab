<div class="well">
<h1 class="text-right"><?= $title; ?></h1>
<?php //echo form_open('users/ForgotPassword'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			
		
			<div class="form-group">
				<label>الايميل</label>
				<input type="email" class="form-control" value="<?php echo set_value('email'); ?>" name="email" placeholder="Email">
			</div>
		
			<div class="form-group">
				<label>  رقم الجوال</label>
				<input type="text" class="form-control" value="<?php echo set_value('mobile'); ?>" name="mobile" placeholder="mobile">
			</div>
        	<div class="form-group">
              <label>طريقة الاستعادة</label>
                <div class="radio">
                  <label><input type="radio" name="sendway" id="optionsRadios1" value="email" checked="">&nbsp&nbsp&nbsp
                    إرسال الرسالة إلى الإيميل
                  </label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="sendway" id="optionsRadios2" value="sms">&nbsp&nbsp&nbsp
                    إرسال الرسالة إلى الجوال
                  </label>
                </div>
            </div>
			<button type="submit" class="btn btn-primary btn-block"> إرسال </button>
		</div>
	</div>
<?php //echo form_close(); ?>
</div>