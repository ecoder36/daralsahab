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
        } );
    } );
</script>
<style type="text/css">
    th, td { text-align: center; }
</style>
<table id="example" class="display" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th>الرقم </th>
                <th>الاسم </th>
                <th>اسم المستخدم </th>
                <th>الصلاحية  </th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $property) : ?>
            <?php if($property['is_admin'] != '99'){ ?>
            <?php 
    		     if( $property['is_admin'] == '1') {$ISadmin = 'مسؤول';}
    			 elseif( $property['is_admin'] == '2') {$ISadmin = 'مستخدم';}
    			 else{$ISadmin ='';}
            ?>
                <tr>
                    <td><?php echo $property['u_id']; ?> </td>
                    <td><?php echo $property['u_name']; ?></td>
                    <td><?php echo $property['username']; ?></td>
                    <td><?php echo $ISadmin; ?></td>
                    <td class="dontprint"><a class="btn btn-default" href="<?php echo base_url(); ?>users/resetmaster/<?php echo $property['u_id']; ?>">استعادة كلمة المرور</a></td>
                </tr>
            <?php } endforeach; ?>
        </tbody>
</table>

                  <li><a href="<?php echo base_url(); ?>users/register"> إضافة مستخدم</a></li>