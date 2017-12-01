<script type="text/javascript" class="init">
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 4, "desc" ]],
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
              //  "targets": [ 4 ],
              //  "visible": false,
              //  "searchable": false
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
    th, td { text-align: center; }
</style>
<input name="b_print" type="button" class="btn btn-default"   onClick="printdiv('div_print');" value=" طباعة ">

<a class="btn btn-success" href="<?php echo base_url(); ?>worker/form">إضافة عامل</a>
<div class="well content">

    <div id="div_print">
    <table id="example" class="display" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الجوال</th>
                <th>رقم العامل</th>
                <th>تاريخ البطاقة</th>
                <th> الأيام  </th>
                <th> جواز السفر </th>
                <th> تاريخ انتهاء الجواز  </th>
                <th>الصورة</th>
                <th class="dontprint">المزيد</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($posts as $property) : ?>
            <tr>
                <td><?php echo $property['name']; ?> </td>
                <td><?php echo $property['mobile']; ?></td>
                <td><?php echo $property['workerID']; ?></td>
				<?php 
				//	$bd =  substr($property['created_at'], 0, 10); 
					$bd =  $property['idDate'] ; 
					$now = Date('d-m-Y') ; 
                    $datetime1 = new DateTime($bd);$datetime2 = new DateTime($now);
                    $interval55 = $datetime1->diff($datetime2);
                    //$since = $interval55->format('%a Days %h Hours %i Minute %m monthes ');
                    $dayes = $interval55->format('%a');
                ?>
                <?php if($dayes >= 360){  ?>  
                <td width="150" bgcolor="red"><?php echo $property['idDate']; ?></td>
        	    <td width="150" bgcolor="red"><?php echo  $dayes ; ?></td>
        	    <?php  }elseif( 330 <= $dayes && $dayes < 360){ ?> 
        	     <td width="150" bgcolor="yellow"><?php echo $property['idDate']; ?></td>
        	     <td width="150" bgcolor="yellow"><?php echo  $dayes ; ?></td>
        		<?php }else{ ?>  
        		<td width="150" bgcolor="green"><?php echo $property['idDate']; ?></td>
        		<td width="150" bgcolor="green"><?php echo  $dayes ; ?></td>
        		<?php } ?>
        		<td><?php echo $property['passport_no']; ?></td>
        		<td><?php echo $property['passport_date']; ?></td>
                <td width="121"><img height="122" class="post-thumb" src="<?php echo base_url(); ?>assets/images/posts/<?php if($property['default'] == 'notdef' || $property['file']!=NULL){ echo $property['file']; }else{echo 'noimage.jpg'; } ?>"></td>
                <td class="dontprint"><p><a class="btn btn-default btn-sm" href="<?php echo base_url('/worker/view/'.$property['id'].'/'.url_title(mb_substr($property['name'], 0, 12))); ?>"> قراءة المزيد </a></p></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>