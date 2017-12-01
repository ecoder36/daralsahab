<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<!-- Refrence 
https://silviomoreto.github.io/bootstrap-select/examples/
Bootstrap-select example
https://codepen.io/Rio517/pen/NPLbpP/
-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>-->
<!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            
<a  href="<?php echo base_url(); ?>contracts">    قائمة العقود  </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> <?= $title ?> </span>
        </li>
    </ul>
<!-- END PAGE BREADCRUMBS -->


<?php echo form_open_multipart('contracts/create'); date_default_timezone_set('Asia/Riyadh'); ?>
    <div class="row">
        <div class="well content">
            <div class="col-md-12">
        		<h1 class="text-center"><?= $title; ?></h1>
            	<div class="form-group">
    				<label> المالك </label>
    				<select style="height:50px;" name="owner" class="form-control" id="select">
    				  <option></option>
    				  <?php foreach($owners as $owner) : ?>
    				  <option value="<?php echo $owner['ow_name']; ?>"><?php echo $owner['ow_name']; ?></option>
                      <?php endforeach; ?>
    		        </select>
    			</div>
        		<div class="form-group">
        			<label> اسم المستأجر  </label>
        			<input type="text" class="form-control" value="<?php echo set_value('co_rental'); ?>" name="co_rental" placeholder=" المستأجر ">
        		</div>
        		<div class="form-group">
        			<label>الجوال</label>
        			<input type="text" class="form-control" value="<?php echo set_value('co_mobile'); ?>" name="co_mobile" placeholder="الجوال">
        		</div>
        		<div class="form-group">
        			<label> شقة رقم </label>
        			<input type="text" class="form-control" value="<?php echo set_value('co_flat'); ?>" name="co_flat" placeholder="رقم الشقة">
        		</div>
        		<div class="form-group">
        			<label>تاريخ بداية العقد</label>
        			<input type="date" class="form-control" value="<?php echo set_value('co_start'); ?>" name="co_start" placeholder="بداية العقد">
        		</div>
        		<div class="form-group">
        			<label>تاريخ نهاية العقد</label>
        			<input type="date" class="form-control" value="<?php echo set_value('co_end'); ?>" name="co_end" placeholder="نهاية العقد">
        		</div>
        		
        		
        	</div>
        	<div class="text-center">
        	     <button type="submit" class="btn btn-primary btn-block1 ">حفظ</button>
        
        	</div>
       	</div>
    </div>
</form>

 <script>
                CKEDITOR.replace( 'editor1' );
            </script>