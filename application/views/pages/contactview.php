

<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#example').DataTable( {
            "order": [[ 0, "desc" ]],
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
                },
                ],
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

    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.childRowImmediate
        }
    }
        } );
    } );
</script>
<style type="text/css">
    h2, th, td { text-align: center; }
</style>
<div class="well content">
    
<h2><?= $title ?></h2><br>
<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th>الرقم </th>
                <th>الاسم </th>
                <th>الايميل </th>
                <th> الجوال </th>
                <th>الرسالة  </th>
                <th> قراءة المزيد  </th>
                <!--<th> </th>-->
            </tr>
        </thead>
        <tbody>

<?php foreach($posts as $contact) : ?>
                <tr>
                    <td><?php echo $contact['id']; ?> </td>
                    <td><?php echo $contact['name']; ?></td>
                    <td><?php echo $contact['mail']; ?></td>
                    <td><?php echo $contact['mobile']; ?></td>
                    <td><?php echo word_limiter($contact['message'], 3); ?></td>
                    <td>
                    <a class="btn btn-default btn-sm" href=" <?php echo base_url(); ?>contact/view/<?php echo $contact['id']; 
		// echo base_url('/contact/view/'.$contact['id'].'/'.url_title(mb_substr($contact['massege'], 0, 29))); ?>"> قراءة الرسالة </a></td>
                   
                    <!--for Admin-->
		         	<!-- <td>	<a class="btn-link text-danger" href="<?php // echo base_url(); ?>contact/delete/<?php // echo $contact['id']; ?>">[ X ]</a></td> -->
					<!--end for Admin-->
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>
</div>
