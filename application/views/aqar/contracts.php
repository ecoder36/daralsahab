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
    
} );
</script>
<style type="text/css">
    th, td, table { text-align: center; }
</style>
<input name="b_print" type="button" class="btn btn-default"   onClick="printdiv('div_print');" value=" طباعة ">

<a class="btn btn-success" href="<?php echo base_url(); ?>terms"> البنود </a>

<a class="btn btn-success" href="<?php echo base_url(); ?>owners"> الملاك </a>

<a class="btn btn-success" href="<?php echo base_url(); ?>contracts/form"> إضافة عقد جديد </a>


<div class="well content" id="div_print">
    <table id="example" class="display" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th>id</th>
                <th>المالك</th>
                <th>المستأجر</th>
                <th>الجوال</th>
                <th>بداية العقد</th>
                <th>نهاية العقد</th>
                <th>إنشاء العقد</th>
                <th>الحالة</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($contracts as $contract) : ?>
            <tr>
                <td><?php echo $contract['co_id']; ?> </td>
                <td><?php echo $contract['owner']; ?> </td>
                <td><?php echo $contract['co_rental']; ?> </td>
                <td><?php echo $contract['co_mobile']; ?> </td>
                <td><?php echo $contract['co_start']; ?> </td>
                <td><?php echo $contract['co_end']; ?> </td>
                <td><?php echo $contract['co_date']; ?> </td>
                <td>ساكن</td>
                <td class="dontprint"><a id="editshow" class="btn btn-default" href="<?php echo base_url(); ?>receipts/view/<?php echo $contract['co_id']; ?>"> عرض</a>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div style='display:none;' id="div_print1">
   
    
</div>
