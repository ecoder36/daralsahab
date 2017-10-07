<script type="text/javascript" class="init">
$(document).ready(function() {
    $('.example').DataTable( {
      //  "order": [[ 4, "desc" ]],
         "ordering": false,
         "searching": false,
         "paging": false,
        "info": false,
        "lengthChange":false,
        "columnDefs": [
            {
              //  "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            ]
    } );
} );
</script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<style type="text/css">
    /*td, th { text-align: center; }*/
</style>
<!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo base_url(); ?>contact/main">قائمة الرسائل </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> <?php echo $post['name']; ?> </span>
        </li>
    </ul>
<!-- END PAGE BREADCRUMBS -->
<div class="well">
<input name="b_print" type="button" class="btn btn-default"   onClick="printdiv('div_print');" value=" طباعة ">
<div id="div_print"><br>
    <table class="display example" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th ></th>
                <th ><?php //echo $post['id']; ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>الاسم</td>
                <td><?php echo $post['name']; ?></td>
            </tr>
            <tr>
                <td>الايميل</td>
                <td><?php echo $post['mail']; ?></td>
            </tr>
            <tr>
                <td>الجوال</td>
                <td><?php echo $post['mobile']; ?></td>
            </tr>
             <tr>
                <td>الرسالة</td>
                <td><?php echo $post['message']; ?></td>
            </tr>
            <tr class="dontprint">
                <td>حذف</td>
                <td><a class="btn-link text-danger" href="<?php echo base_url(); ?>contact/delete/<?php echo $post['id']; ?>"  onclick="return confirm('هل انت متأكد من حذف رسالة  <?php echo $post['name']; ?>')" >حذف</a></td>
            </tr>
        </tbody>
    </table>
</div>




 <table class="display example" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th ></th>
                <th ><?php //echo $post['id']; ?></th>
            </tr>
        </thead>
        <tbody>
           
            <tr>
                <td>إرسال رسالة</td>
                <td>
                <?php echo form_open_multipart('contact/mail'); date_default_timezone_set('Asia/Riyadh'); ?>  
                <div class="row">
            		<div class="col-md-12 col-md-offset-6j">
            			<div class="well auth-content">
            			<h1 class="text-center"> </h1>
            			<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
            			<input type="hidden" name="mail" value="<?php echo $post['mail']; ?>">
            		
            			<div class="form-group">
                			<label>العنوان</label> *
                			<input type="text" class="form-control" <?php echo set_value('subject'); ?> name="subject" placeholder="عنوان الرسالة">
                		</div>
            			<div class="col-md-12">
                        	<div class="form-group">
                        		<label>الرسالة</label> *
                        		<textarea id="editor1" type="text" class="form-control" name="message" placeholder="description" rows="3"><?php echo set_value('message'); ?></textarea>
                        	</div>
                        </div>
            			 &nbsp;&nbsp; &nbsp;&nbsp;
            			<button type="submit" class="btn btn-default btn-sm" id="back-btn"><b>
            			    إرسال
            			     &nbsp;&nbsp;<i class="fa fa-arrow-left"></i></b>
            			</button>
            			</div>
            		</div>
            	</div>
                <?php echo form_close(); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script>CKEDITOR.replace( 'editor1' );</script>