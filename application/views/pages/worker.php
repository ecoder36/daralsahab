


<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<!-- Refrence 
https://silviomoreto.github.io/bootstrap-select/examples/
Bootstrap-select example
https://codepen.io/Rio517/pen/NPLbpP/
-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>-->

<div class="text-center">
<h2><?= $title ?></h2>
<p>أهلا وسهلا بك في الصفحة الرئيسية</p>
</div>

<?php echo form_open_multipart('worker/create'); date_default_timezone_set('Asia/Riyadh'); ?>
    <div class="row">
        <div class="well content">
            <div class="col-md-12">
    
        		<h1 class="text-center"><?= $title; ?></h1>
        		<div class="form-group">
        			<label>اسم العامل</label>
        			<input type="text" class="form-control" value="<?php echo set_value('name'); ?>" name="name" placeholder="الاسم">
        		</div>
        		<div class="form-group">
        			<label>رقم البطاقة</label>
        			<input type="text" class="form-control" value="<?php echo set_value('workerID'); ?>" name="workerID" placeholder="رقم البطاقة">
        		</div>
        		<div class="form-group">
        			<label>الجوال</label>
        			<input type="text" class="form-control" value="<?php echo set_value('mobile'); ?>" name="mobile" placeholder="الجوال">
        		</div>
        		<div class="form-group">
        			<label> تاريخ الاقامة</label>
        			<input type="date" class="form-control" value="<?php echo set_value('idDate'); ?>" name="idDate" placeholder="التاريخ">
        		</div>
        		<div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputFile">المرفقات</label>
                        <input type="file" accept="image/*"  name="f1" class="form-control-file" onchange="loadFile(event)">
                        <img style="display:inline;" width="128" height="128" id="output" src="#" alt="your image b"/><br>
                        <script>
                          var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                          };
                        </script>
                    </div>
                </div>
        	</div>
        	<div class="text-center">
        	     <button type="submit" class="btn btn-primary btn-block1 ">Submit</button>
        
        	</div>
       	</div>
    </div>
</form>

 <script>
                CKEDITOR.replace( 'editor1' );
            </script>