<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('property/update'); date_default_timezone_set('Asia/Riyadh'); ?>
 	<input type="hidden" name="id" value="<?php echo $post['p_id']; ?>">
     <div class-"row">
        <div class="col-md-6">
            <div class="form-group">
        		<label>mobile</label>
        		<input type="text" class="form-control" name="mobile" value="<?php echo $post['mobile']; ?>" placeholder="mobile">
        	</div>
        </div>
        <div class="col-md-6">
        	<div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $post['email']; ?>" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
        </div>
    </div>
    <div class-"row">
        <div class="col-md-6">
            <div class="form-group">
        		<label>country</label>
        		<input type="text" class="form-control" name="country" value="<?php echo $post['country']; ?>" placeholder="country">
        	</div>
        </div>
        <div class="col-md-6">
        	<div class="form-group">
            <label>city</label>
        		<input type="text" class="form-control" name="city" value="<?php echo $post['city']; ?>" placeholder="city">
            </div>
        </div>
    </div>
    <div class-"row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="exampleSelect1">select Rent or Sale</label>
            <select class="form-control" id="exampleSelect1" name="rentOrSale">
                <option value="<?php echo $post['rent_sale']; ?>"><?php echo $post['rent_sale']; ?></option>
                <option value="rent">for Rent</option>
                <option value="sale">for Sale</option>
            </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
        		<label>price</label>
        		<input type="text" class="form-control" name="price" value="<?php echo $post['price']; ?>" placeholder="price">
        	</div>
        </div>
    </div>
    <div class-"row">
        <div class="col-md-12">
            <div class="form-group">
        		<label>Title</label>
        		<input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>" placeholder="Title">
        	</div>
        </div>
        <div class="col-md-12">
        	<div class="form-group">
        		<label>description</label>
        		<textarea  id="editor1" type="text" class="form-control" value="<?php echo $post['description']; ?>" name="description" placeholder="description" rows="3"> <?php echo $post['description']; ?></textarea>
        	</div>
        </div>
    </div>
    
    
    <div class-"row">
        <div class="col-md-12 col-md-offset-0">
            
            <input type="hidden" name="emailOrMobile" value="<?php echo $post['contact_by']; ?>">
    	
        	
          <div class="form-group">
            <!--Images -->
<hr>
<h3>Images</h3>
<?php  if($files) : ?>

<table class="table1">

	<tr>
	
		<?php foreach($files as $file) : ?>
		<!--<div class="well">-->
		<td>
		
		 	<?php if($file['file_name'] == 'noimage.jpg' && count($files) === 1): ?>
		 		<img width="128" height="128" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $file['file_name']; ?>">
		 	<?php elseif($file['file_name'] != 'noimage.jpg'): ?>
		 		<img width="128" height="128" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $file['file_name']; ?>">&nbsp &nbsp&nbsp&nbsp<br><br>
		 		  
		 			<a onclick="return confirm('Are you sure? Delete <?php echo $file['file_name']; ?>')" href="<?php echo site_url(); ?>property/delete_file/<?php echo $file['id']; ?>" class="btn-link text-danger">[X]</a>
		 		
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
	    <a  href="" data-toggle="modal" data-target="#myModal">Add New Image</a>
	</td>
	</tr>
</table>
<?php else : ?>
	<p>No images To Display</p>
<?php endif; ?>

	<hr>
	
	
          </div>
           
          <div class="form-check">
            <label class="form-check-label">
              <input name="condetion" type="checkbox" class="form-check-input" required>
              Check me out for condetion
            </label>
          </div>
        </div>
            
    	</div>
    	
  
  
  	<div class="row">
  	    <div class="col-md-12 col-md-offset-1"> 
  	     <button type="submit" class="btn btn-primary  btn-lg">Submit</button>
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
              <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('property/add_file'); date_default_timezone_set('Asia/Riyadh'); ?>
              <div class="modal-body">
                
                    <p>Some text in the modal.</p>
                    <input type="hidden" name="id" value="<?php echo $post['p_id']; ?>">
                    <label for="exampleInputFile">File input</label><input type="file" name="morefile" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" >
    	            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    	            
	            
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