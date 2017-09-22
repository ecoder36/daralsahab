
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
              //  "targets": [ 4 ],
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
            <a href="<?php echo base_url(); ?>users/main">عرض المستخدمين</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> <?php echo $user['u_name']; ?> </span>
        </li>
    </ul>
<!-- END PAGE BREADCRUMBS -->
<div class="well">
	<div id="div_print"><br>
	    <table id="example" class="display" cellspacing="0" width="100%" dir="rtl">
	        <thead>
	            <tr>
	                <th class="centere">الاسم</th>
	                <th>الجوال</th>
	                <th> الايميل </th>
	                <th> اسم المستخدم </th>
	                <th> تعديل </th>
	                <th> </th>
	            </tr>
	        </thead>
	        <tbody>
	        	<tr>
	                <td><?php echo $user['u_name']?></td>
	                <td><?php echo $user['mobile']; ?></td>
	                <td><?php echo $user['u_email']; ?></td>
	                <td><?php echo $user['username']; ?></td>
	                <td class="dontprint"><a class="btn btn-default" href="<?php echo base_url(); ?>users/edit/<?php echo $user['u_id']; ?>">تعديل</a></td>
	                <td class="dontprint"><a onclick="return confirm('Are you sure? Delete <?php echo $user['u_name']; ?>')" class="btn-link text-danger" href="<?php echo base_url(); ?>users/delete/<?php echo $user['u_id']; ?>">حذف</a></td>
	            </tr>
	        </tbody>
	    </table>
	</div>
</div>
