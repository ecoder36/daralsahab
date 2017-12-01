<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script type="text/javascript" class="init">
$(document).ready(function() {
    $('#example').DataTable( {
        //"order": [[ 0, "desc" ]],
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
  
        "responsive": {
        "details": {
            display: $.fn.dataTable.Responsive.display.childRowImmediate
        }
    }    
    } );
    $('.pr').DataTable( {
        //"order": [[ 0, "desc" ]],
          "ordering": false,
        "searching": false,
        "paging": false,
        "info": false,
        "lengthChange":false,

  
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

<input name="b_print" type="button" class="btn btn-default"   onClick="printdiv('div_print');" value=" طباعة ">

<button data-toggle="modal" data-target="#addModal" class="btn btn-success">اضافة</button>
<div  id="addModal" class="modal">
  <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close pull-left" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"> إضافة بند جديد </h4>
      </div>
      <?php echo form_open('terms/add'); ?>
      <div class="modal-body">
    	<div class="row">
    		<div class="col-md-8 col-md-offset-2">
        		<div class="col-md-12">
                	<div class="form-group">
                		<label>البند</label> 
                		<textarea id="editor1" type="text" class="form-control" name="term" placeholder="term" rows="3"><?php echo set_value('term'); ?></textarea>
                	</div>
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
   <?php echo form_open('terms/update'); ?>
	<input type="hidden" name="term_id" value="<?php echo @$post['term_id']; ?>">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
            	<label>البند</label> 
                <textarea id="editor2" type="text" class="form-control" name="term" placeholder="term" rows="3"><?php echo @$post['term']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block"> تعديل  </button>
    	</div>
    </div>
    <?php echo form_close(); ?>
</div>
<div class="well content">
    <table id="example" class="display" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th>c</th>
                <th>id</th>
                <th>term</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php $c = 1 ; foreach($terms as $term) : ?>
            <tr>
                <td><?php echo $c++ ; ?> </td>
                <td><?php echo $term['term_id']; ?> </td>
                <td><?php echo $term['term']; ?> </td>
                <td class="dontprint"><a id="editshow" class="btn btn-default" href="<?php echo base_url(); ?>terms/edit/<?php echo $term['term_id']; ?>">تعديل</a>
                <a class="btn-link text-danger" onclick="return confirm('هل انت متأكد من حذف معلومات <?php echo $term['term_id']; ?>')" href="<?php echo base_url(); ?>terms/delete/<?php echo $term['term_id']; ?>">حذف</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<div style='display:none1;' id="div_print">
    <?php $c = 1 ; foreach($terms as $term) : ?>
 
    <?php echo $c++.$term['term']; ?><br>
            
        <?php endforeach; ?>
        
    <table style='display:none;' class="display pr" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th>c</th>
                <th>term</th>
            </tr>
        </thead>
        <tbody>
        <?php $c = 1 ; foreach($terms as $term) : ?>
            <tr>
                <td><?php echo $c++ ; ?> </td>
                <td><?php echo $term['term']; ?> </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    
</div>

    
 <script>  CKEDITOR.replace( 'editor1' );  CKEDITOR.replace( 'editor2' );</script>