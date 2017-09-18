


<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<!-- Refrence 
https://silviomoreto.github.io/bootstrap-select/examples/
Bootstrap-select example
https://codepen.io/Rio517/pen/NPLbpP/
-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>-->
<h2><?= $title ?></h2>
<p>أهلا وسهلا بك في الصفحة الرئيسية</p>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('worker/update'); date_default_timezone_set('Asia/Riyadh'); ?>
	<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <div class="row">
        <div class="col-md-12">
    		<h1 class="text-center"><?= $title; ?></h1>
    		<div class="form-group">
    			<label>اسم العامل</label>
    			<input type="text" class="form-control" value="<?php echo $post['name']; ?>" name="name" placeholder="الاسم">
    		</div>
    		<div class="form-group">
    			<label>رقم البطاقة</label>
    			<input type="text" class="form-control" value="<?php echo $post['workerID']; ?>" name="workerID" placeholder="رقم البطاقة">
    		</div>
    		<div class="form-group">
    			<label>الجوال</label>
    			<input type="text" class="form-control" value="<?php echo $post['mobile']; ?>" name="mobile" placeholder="الجوال">
    		</div>
    		<div class="form-group">
    			<label> تاريخ الاقامة</label>
    			<input type="date" class="form-control" value="<?php echo $post['idDate']; ?>" name="idDate" placeholder="التاريخ"><?php echo $post['idDate']; ?>
    		</div>
    	</div>
    	
    	
    	<hr>
<h3>المرفقات</h3>
<?php  if($files) : ?>
<table class="table1">
	<tr>
		<?php foreach($files as $file) : ?>
		<!--<div class="well">-->
		<td>
		 	<?php if($file['file'] == 'noimage.jpg' && count($files) === 1): ?>
		 		<img width="128" height="128" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $file['file']; ?>">
		 	<?php elseif($file['file'] != 'noimage.jpg'): ?>
		 		<img width="128" height="128" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $file['file']; ?>">&nbsp &nbsp&nbsp&nbsp<br><br>
		 			<a onclick="return confirm('Are you sure? Delete <?php echo $file['file']; ?>')" href="<?php echo site_url(); ?>worker/delete_file/<?php echo $file['f_id']; ?>" class="btn-link text-danger">[X]</a>
			<?php endif; ?>
			 		</td>
		<!--</div>-->
		<?php endforeach; ?>
	</tr>
	<tr>
    	<td>
	    <br><br>
	</td>
    </tr>
	<tr><td>
	    <a  href="" data-toggle="modal" data-target="#myModal">إضافة مرفقات جديدة</a>
	</td>
	</tr>
</table>
<?php else : ?>
	<p>No images To Display</p>
<?php endif; ?>

	<hr>
    	<div class="text-center">
    	     <button type="submit" class="btn btn-primary btn-block1 ">Submit</button>
    
    	</div>
   	
    </div>
</form>

<!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
            
                <?php echo form_open_multipart('worker/add_file'); date_default_timezone_set('Asia/Riyadh'); ?>
              <div class="modal-body">
                
                    <p>Some text in the modal.</p>
                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                    <label for="exampleInputFile">File input</label>
                    
                    <input type="file" name="morefile" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" onchange="loadFile(event)" accept="image/*">
    	            
    	            
    	             
    	            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    	            <img style="display:inline;" width="128" height="128" id="output" src="#" alt="your image b"/><br>
    	            <script>
                      var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                      };
                    </script>
	            
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
              <?php echo form_close(); ?>
              
            </div>
        
          </div>
        </div>
        <!-- End Modal -->
 <script>
                CKEDITOR.replace( 'editor1' );
            </script>