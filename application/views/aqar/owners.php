<script type="text/javascript" class="init">
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 0, "desc" ]],
         // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "لا يوجد معلومات لعرضها الآن",
                "info": "المعلومات الظاهرة :  _START_ إلى _END_ من أصل _TOTAL_ ",
                "infoEmpty": "لا يوجد معلومات",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "إظهار _MENU_ لكل صفحة",
                "search": "بحث:",
                "searchPlaceholder": "بحث سريع",
                "zeroRecords": "لا يوجد معلومات"
            },
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            ],
        responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.childRowImmediate
        }
    }    
    } );
    
} );
</script>
<style type="text/css">
    th, td, table { text-align: center; }
</style>
<!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo base_url(); ?>contracts"> صفحة العقود </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> <?php echo $title ; ?> </span>
        </li>
    </ul>
<!-- END PAGE BREADCRUMBS -->
<input name="b_print" type="button" class="btn btn-default" onClick="printdiv('div_print');" value=" طباعة ">

<button data-toggle="modal" data-target="#addModal" class="btn btn-success">اضافة</button>
<div  id="addModal" class="modal">
  <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close pull-left" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">  معلومات المستخدم </h4>
      </div>
      <?php echo form_open('owners/add'); ?>
      <div class="modal-body">
    	<div class="row">
    		<div class="col-md-8 col-md-offset-2">
    			<div class="form-group">
    				<label>الاسم</label>
    				<input type="text" class="form-control" value="<?php echo set_value('ow_name'); ?>" name="ow_name" placeholder="Name">
    			</div>
    			<div class="form-group">
    				<label>  رقم الجوال</label>
    				<input type="text" class="form-control" value="<?php echo set_value('ow_mobile'); ?>" name="ow_mobile" placeholder="mobile">
    			</div>
    		</div>
    	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
    	<button type="submit" class="btn btn-primary">إضافة  </button>
      </div>
      <?php echo form_close(); ?>
      </div>
 </div>
</div>
<div <?php echo @$style ; ?> class="well content editform">
   <?php echo form_open('owners/update'); ?>
	<input type="hidden" name="ow_id" value="<?php echo @$post['ow_id']; ?>">
    <div class="row">
        <div class="col-md-12">
          
    		<div class="form-group">
    			<label> الاسم</label>
    			<input type="text" class="form-control" value="<?php echo @$post['ow_name']; ?>" name="ow_name" placeholder="الاسم">
    		</div>
    		<div class="form-group">
    			<label>الجوال</label>
    			<input type="text" class="form-control" value="<?php echo @$post['ow_mobile']; ?>" name="ow_mobile" placeholder="الجوال">
    		</div>
            <button type="submit" class="btn btn-primary btn-block"> تعديل  </button>
    	</div>
    </div>
<?php echo form_close(); ?>
</div>

<div class="well content">
    <div id="div_print">
    <table id="example" class="display" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th> </th>
                <th>الاسم</th>
                <th>الجوال</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($owners as $owner) : ?>
            <tr>
                <td><?php echo $owner['ow_id']; ?> </td>
                <td><?php echo $owner['ow_name']; ?> </td>
                <td><?php echo $owner['ow_mobile']; ?></td>
                <td class="dontprint"><a id="editshow" class="btn btn-default" href="<?php echo base_url(); ?>owners/edit/<?php echo $owner['ow_id']; ?>">تعديل</a>
                <a class="btn-link text-danger" onclick="return confirm('هل انت متأكد من حذف معلومات <?php echo $owner['ow_name']; ?>')" href="<?php echo base_url(); ?>owners/delete/<?php echo $owner['ow_id']; ?>">حذف</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>