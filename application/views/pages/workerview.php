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
        <?php foreach($posts as $property) : ?>
            <tr>
                <td><?php echo $property['name']; ?> </td>
                <td><?php echo $property['mobile']; ?></td>
                <td><?php echo $property['workerID']; ?></td>
				<?php 
				//	$bd =  substr($property['created_at'], 0, 10); 
					$bd =  $property['idDate'] ; 
					$now = Date('d-m-Y H:i:s') ; 
                    $datetime1 = new DateTime($bd);$datetime2 = new DateTime($now);
                    $interval55 = $datetime1->diff($datetime2);
                    //$since = $interval55->format('%a Days %h Hours %i Minute %m monthes ');
                    $dayes = $interval55->format('%a');
                ?>
                <?php if($dayes >= 360){ ?>  
                <td width="150"><?php echo $property['idDate']; ?></td>
        	    <td width="150" ><?php echo  $dayes ; ?></td>
        		<?php }else{ ?>  
        		<td width="150" bgcolor="green"><?php echo $property['idDate']; ?></td>
        		<td width="150" bgcolor="green"><?php echo  $dayes ; ?></td>
        		<?php } ?>
                <td width="121"><img height="122" class="post-thumb" src="<?php echo base_url(); ?>assets/images/posts/<?php if($property['default'] == 'notdef' || $property['file']!=NULL){ echo $property['file']; }else{echo 'noimage.jpg'; } ?>"></td>
                <td>
                <p><a class="btn btn-default btn-sm" href="<?php echo base_url('/worker/view/'.$property['id'].'/'.url_title(mb_substr($property['name'], 0, 29))); ?>">Read More</a></p>
                	<div class="pull-right">
        					<!--for Admin-->
        					<a class="btn-link text-danger" href="<?php echo base_url(); ?>worker/delete/<?php echo $property['id']; ?>">[ X ]</a>
        					<?php echo $property['id']; ?>
        					<!--end for Admin-->
        			</div> 

</td>
            </tr>

<?php endforeach; ?>
        </tbody>
    </table>