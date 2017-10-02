


<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<!-- Refrence 
https://silviomoreto.github.io/bootstrap-select/examples/
Bootstrap-select example
https://codepen.io/Rio517/pen/NPLbpP/
-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>-->

<div class="center">
<h2><?= $title ?></h2>
</div>

<?php echo form_open_multipart('contact/create'); date_default_timezone_set('Asia/Riyadh'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="well content">
    		<h1 class="text-center"> </h1>
    		<div class="form-group">
    			<label>الاسم</label> *
    			<input type="text" class="form-control" <?php echo set_value('name'); ?> name="name" placeholder="الاسم">
    		</div>
    		<div class="form-group">
    			<label>الجوال</label>
    			<input type="text" class="form-control" <?php echo set_value('mobile'); ?> name="mobile" placeholder="الجوال">
    		</div>
    			<div class="form-group">
    			<label>الايميل</label>
    			<input type="email" <?php echo set_value('email'); ?> class="form-control" name="email" placeholder="الايميل">
    		</div>
    		<div class="col-md-12">
            	<div class="form-group">
            		<label>الرسالة</label> *
            		<textarea id="editor1" type="text" class="form-control" name="message" placeholder="description" rows="3"><?php echo set_value('description'); ?></textarea>
            	</div>
            </div>
    		<button type="submit" class="btn btn-primary btn-block">إرسال</button>
    		</div>
    	</div>
    
    </div>
</form>

 <script>
                CKEDITOR.replace( 'editor1' );
            </script>