
<script type="text/javascript" class="init">
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 4, "desc" ]],
         "ordering": false,
         "searching": false,
         "paging": false,
"info": false,
"lengthChange":false,
 //dom: 'Bfrtip',
//buttons: [{   extend: 'print', text: '<a class="btn btn-default">Print current page</a>' }],
  //   buttons: [ 'copy', 'csv', 'print', 'colvis' ],
    //  dom: 'Bfrtip',
    //     buttons: [
    //         'print'
    //     ],
        "columnDefs": [
            {
                "targets": [ 4 ],
                "visible": false,
                "searchable": false
            },
            ]
    } );
} );
</script>
<style type="text/css">
    th, td { text-align: center; }
</style>
<!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo base_url(); ?>worker/main">قائمة العاملين </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> <?php echo $post['name']; ?> </span>
        </li>
    </ul>
<!-- END PAGE BREADCRUMBS -->
<div class="main">
<input name="b_print" type="button" class="btn btn-default"   onClick="printdiv('div_print');" value=" طباعة ">
<div id="div_print"><br>
    <table id="example" class="display" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th class="centere">الاسم</th>
                <th >الجوال</th>
                <th>رقم العامل</th>
                <th>تاريخ البطاقة</th>
                <th>تاريخ الانشاء</th>
                <th class="dontprint">الصورة</th>
                <th class="dontprint">المزيد</th>
            </tr>
        </thead>
        <tbody>
        	<tr>
                <td><?php echo $post['name']; ?></td>
                <td><?php echo $post['mobile']; ?></td>
                <td><?php echo $post['workerID']; ?></td>
                <td><?php echo $post['idDate']; ?></td>
                <td><?php echo $post['created_at']; ?></td>
                <td class="dontprint"><a class="btn btn-default" href="<?php echo base_url(); ?>worker/edit/<?php echo $post['id']; ?>">تعديل</a></td>
                <td class="dontprint"><a class="btn-link text-danger" onclick="return confirm('هل انت متأكد من حذف معلومات <?php echo $post['name']; ?>')" href="<?php echo base_url(); ?>worker/delete/<?php echo $post['id']; ?>">حذف</a></td>
            </tr>
        </tbody>
    </table>
    <!--Images -->
    <div >
    <hr>
    <h3>المرفقات</h3>
    <?php  if($files) : ?>
    <table class="table">
    	<tr>
    		<?php foreach($files as $file) : ?>
    		<td>
    		    <img  width="128" height="128" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $file['file']; ?>">
    		<a class="dontprint" target="_blank" href="<?php echo site_url(); ?>assets/images/posts/<?php echo $file['file']; ?>"><?php echo $file['file']; ?></a>
    		</td>
    		<?php endforeach; ?>
    	</tr>
    </table>
    <?php else : ?>
    	<p>No images To Display</p>
    <?php endif; ?>
    	<hr>
    </div>
</div>
</div>