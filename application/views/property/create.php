<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<!-- Refrence 
https://silviomoreto.github.io/bootstrap-select/examples/
Bootstrap-select example
https://codepen.io/Rio517/pen/NPLbpP/
-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>-->
<?php echo $title ; ?>
<br><br>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('property/create'); date_default_timezone_set('Asia/Riyadh'); ?>
 
     <div class-"row">
        <div class="col-md-6">
            <div class="form-group">
        		<label>mobile</label>
        		<input type="text" class="form-control" name="mobile" placeholder="mobile">
        	</div>
        </div>
        <div class="col-md-6">
        	<div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
        </div>
    </div>
    <div class-"row">
        <div class="col-md-6">
            <div class="form-group">
        		<label>country</label>
        		<input type="text" class="form-control" name="country" value="<?php echo set_value('country'); ?>" placeholder="country">
        		
        	</div>
        </div>
        <div class="col-md-6">
        	<div class="form-group">
                	<label>city</label>
        		<input type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>" placeholder="city">
            </div>
        </div>
    </div>
    <div class-"row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="exampleSelect1">select Rent or Sale</label>
            <select class="form-control" id="exampleSelect1" name="rentOrSale">
                <option value="" data-tokens="">Select</option>
                <option value="rent" data-tokens="rent">for Rent</option>
                <option value="sale" data-tokens="sale">for Sale</option>
            </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
        		<label>price</label>
        		<input type="text" class="form-control" name="price" value="<?php echo set_value('price'); ?>" placeholder="price">
        	</div>
        </div>
    </div>
    <div class-"row">
        <div class="col-md-12">
            <div class="form-group">
        		<label>Title</label>
        		<input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" placeholder="Title">
        	</div>
        </div>
        <div class="col-md-12">
        	<div class="form-group">
        		<label>description</label>
        		<textarea  id="editor1" type="text" class="form-control" name="description" placeholder="description" rows="3"><?php echo set_value('description'); ?></textarea>
        	</div>
        </div>
    </div>
    
    
    <div class-"row">
        <div class="col-md-12 col-md-offset-0">
             <fieldset class="form-group">
                <legend>Contact Way</legend>
                <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="emailOrMobile" id="optionsRadios1" value="by_email_or_mobile" checked>
                    Contact me by email or mobile 
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="emailOrMobile" id="optionsRadios2" value="byemail" >
                    Contact me by &mdash; email only
                  </label>
                </div>
                <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="emailOrMobile" id="optionsRadios3" value="bymobile">
                    Contact me by &mdash; mobile only
                  </label>
                </div>
          </fieldset>    	
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" accept="image/*"  name="f1" class="form-control-file" onchange="loadFile(event)">
            <img style="display:inline;" width="128" height="128" id="output" src="#" alt="your image b"/>
            <input  type="file" accept="image/*" name="f2" class="form-control-file" onchange="loadFile2(event)">
            <img style="display:inline;" width="128" height="128" id="output2" src="#" alt="your image b"/>
            <script>
              var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
              };
              var loadFile2 = function(event) {
                var output = document.getElementById('output2');
                output.src = URL.createObjectURL(event.target.files[0]);
              };
            </script>
            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input">
              Check me out
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

 <script>
                CKEDITOR.replace( 'editor1' );
            </script>
           