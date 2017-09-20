
<script type="text/javascript" class="init">
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 4, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 4 ],
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
                <th>الاسم</th>
                <th>الجوال</th>
                <th>رقم العامل</th>
                <th>تاريخ البطاقة</th>
                <th>تاريخ الانشاء</th>
                <th>الصورة</th>
                <th>المزيد</th>
            </tr>
        </thead>
        <tbody>
        	<tr>
                <td><?php echo $post['name']; ?></td>
                <td><?php echo $post['mobile']; ?></td>
                <td><?php echo $post['workerID']; ?></td>
                <td><?php echo $post['idDate']; ?></td>
                <td><?php echo $post['created_at']; ?></td>
                <td><a class="btn btn-default pull-right" href="<?php echo base_url(); ?>worker/edit/<?php echo $post['id']; ?>">Edit</a></td>
                <td><a class="btn-link text-danger pull-right" href="<?php echo base_url(); ?>worker/delete/<?php echo $post['id']; ?>">Delete</a></td>
            </tr>
           

        </tbody>
    </table>





<!--Images -->
<hr>
<h3>Images</h3>
<?php  if($files) : ?>
<table class="table">
	<tr>
		<?php foreach($files as $file) : ?>
		<td>
		<a target="_blank" href="<?php echo site_url(); ?>assets/images/posts/<?php echo $file['file']; ?>">
			<img width="128" height="128" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $file['file']; ?>">
		
		</a>
		
		</td>
		<?php endforeach; ?>
	</tr>
</table>
<?php else : ?>
	<p>No images To Display</p>
<?php endif; ?>

	<hr>