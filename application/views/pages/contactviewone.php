<script type="text/javascript" class="init">
$(document).ready(function() {
    $('#example').DataTable( {
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
    <table id="example" class="display" cellspacing="0" width="100%" dir="rtl">
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
</div>

