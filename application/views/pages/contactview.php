

<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#example').DataTable( {
            "order": [[ 0, "desc" ]],
            "columnDefs": [
                {
                 //   "targets": [ 0 ],
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
                <th> الجوال </th>
                <th>الرسالة  </th>
                <th> قراءة المزيد  </th>
                <th> </th>
            </tr>
        </thead>
        <tbody>

<?php foreach($posts as $contact) : ?>
                <tr>
                    <td><?php echo $contact['id']; ?> </td>
                    <td><?php echo $contact['name']; ?></td>
                    <td><?php echo $contact['mail']; ?></td>
                    <td><?php echo $contact['mobile']; ?></td>
                    <td><?php echo word_limiter($contact['message'], 10); ?></td>
                    <td>
                    <a class="btn btn-default btn-sm" href=" <?php echo base_url(); ?>contact/view/<?php echo $contact['id']; 
		// echo base_url('/contact/view/'.$contact['id'].'/'.url_title(mb_substr($contact['massege'], 0, 29))); ?>">Read More </a></td>
                    <td>
                    <!--for Admin-->
					<a class="btn-link text-danger" href="<?php echo base_url(); ?>contact/delete/<?php echo $contact['id']; ?>">[ X ]</a>
					<!--end for Admin-->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>

