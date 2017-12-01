<script type="text/javascript" class="init">
$(document).ready(function() {
    $('.receipt').DataTable( {
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
        $('.contract').DataTable( {
        "order": [[ 4, "desc" ]],
        "ordering": false,
        "searching": false,
        "paging": false,
        "info": false,
        "lengthChange":false,

     
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
<button data-toggle="modal" data-target="#receiptModal" class="btn btn-success">إنشاء سند استلام</button>
<div  id="receiptModal" class="modal">
  <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close pull-left" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">   سند استلام   </h4>
      </div>
      <?php echo form_open('receipts/create'); ?>
      <div class="modal-body">
    	<div class="row">
    		<div class="col-md-8 col-md-offset-2">
    		    <input type="hidden" name="contract_id" value="<?php echo $contr_id; ?>">
    			<div class="form-group">
    				<label>اسم المستأجر</label>
    				<input type="text" class="form-control" value="<?php echo $contract['co_rental'] ?>" name="payer" placeholder="اسم المستأجر">
    			</div>
    			<div class="form-group">
    				<label>   المبلغ </label>
    				<input type="text" class="form-control" value="<?php echo set_value('amount'); ?>" name="amount" placeholder="المبلغ">
    			</div>
    			<div class="form-group">
    				<label>   من </label>
    				<input type="date" class="form-control" value="<?php echo set_value('from_date'); ?>" name="from_date" placeholder="من تاريخ">
    			</div>
    			<div class="form-group">
    				<label>   إلى </label>
    				<input type="date" class="form-control" value="<?php echo set_value('to_date'); ?>" name="to_date" placeholder="إلى تاريخ">
    			</div>
    			<div class="form-group">
    				<label>   وذلك عن </label>
                    <textarea type="text" class="form-control" name="clarification" rows="3"><?php echo set_value('clarification'); ?></textarea>
    			</div>
    			<div class="form-group">
    				<label>   المستلم </label>
    				<input type="text" class="form-control" value="<?php echo $_SESSION['name']; ?>" name="recipient" placeholder="المستلم">
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

<input name="b_print" type="button" class="btn btn-default"   onClick="printdiv('div_print');" value=" طباعة ">
<div class="well content">
    <div id="div_print">
    <table id="example" class="display receipt" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th> </th>
                <th>الاسم</th>
                <th>الجوال</th>
                <th> </th>
                <th> </th>
                <th> </th>
                <th> </th>
             
            </tr>
        </thead>
        <tbody>
        <?php foreach($receipts as $receipt) : ?>
            <tr>
                <td><?php echo $receipt['receipt_id']; ?> </td>
                <td><?php echo $receipt['payer']; ?> </td>
                <td><?php echo $receipt['amount']; ?></td>
                <td><?php echo $receipt['from_date']; ?></td>
                <td><?php echo $receipt['to_date']; ?></td>
                <td><?php echo $receipt['receipt_date']; ?></td>
                <td>
                    <input name="b_print" type="button" class="btn btn-default" onClick="printdiv('div_print_<?php echo $receipt['receipt_id']; ?>');" value=" print ">
                
                <div style="display:none" id="div_print_<?php echo $receipt['receipt_id']; ?>">
            <div class="well content">
    <table id="example" class="display contract" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th> </th>
             <th> </th>
             <th> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $receipt['receipt_id']; ?> </td>
                <td><?php echo $receipt['payer']; ?> </td>
                <td><?php echo $receipt['amount']; ?></td>
            </tr>
        </tbody>
    </table>
    </div>
    </div>
                
                
                
                
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>





<input name="b_print" type="button" class="btn btn-default" onClick="printdiv('div_print41');" value=" طباعة ">
<div class="well content">
    <div id="div_print41">
            <div class="well content">
    <table id="example" class="display contract" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th> </th>
             <th> </th>
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
 
    </div>
</div>
