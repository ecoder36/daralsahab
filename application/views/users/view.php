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
                ]
        } );
    } );
</script>
<table id="example" class="display" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th>الرقم </th>
                <th>الاسم </th>
                <th>الايميل </th>
                <th>اسم المستخدم </th>
                <th>الجوال  </th>
                <th>الصلاحية  </th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $property) : ?>
            <?php 
    		     if( $property['is_admin'] == '1') {$ISadmin = 'مسؤول';}
    			 elseif( $property['is_admin'] == '2') {$ISadmin = 'مستخدم';}
    			 else{$ISadmin ='';}
            ?>
                <tr>
                    <td><?php echo $property['u_id']; ?> </td>
                    <td><?php echo $property['u_name']; ?></td>
                    <td><?php echo $property['u_email']; ?></td>
                    <td><?php echo $property['username']; ?></td>
                    <td><?php echo $property['mobile']; ?></td>
                    <td><?php echo $ISadmin; ?></td>
                    <td>
                    <p><a class="btn btn-default btn-sm" href="<?php echo base_url('/users/view/'.$property['u_id'].'/'.url_title(mb_substr($property['u_name'], 0, 29))); ?>">Read More</a></p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>