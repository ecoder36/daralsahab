<?php echo $title ; ?>
<a class="btn btn-info btn-lg pull-right" href="<?php echo base_url(); ?>property/create">Add Your Advertisements New</a>
<br><br><br><br>
<?php foreach($posts as $property) : ?>
	<div class="row">
	 	<div class="col-md-2">
	 		<img class="post-thumb" src="<?php echo base_url(); ?>assets/images/posts/<?php if($property['default'] == 'notdef' || $property['file_name']!=NULL){ echo $property['file_name']; }else{echo 'noimage.jpg'; } ?>">
		</div>
		<div class="col-md-8 ">
			<small class="post-date">
				<?php 
					$bd = $property['created_at'] ;$now = Date('d-m-Y H:i:s') ; 
                    $datetime1 = new DateTime($bd);$datetime2 = new DateTime($now);
                    $interval55 = $datetime1->diff($datetime2);
                    $since = $interval55->format('%a Days %h Hours %i Minute ');
                ?>
				<strong><?php echo $property['title']; ?></strong> 
				Posted Since : <?php echo $since ; ?> 
				<div class="pull-right">
					 
					<!--for Admin-->
					<a class="btn-link text-danger" href="<?php echo base_url(); ?>property/delete/<?php echo $property['p_id']; ?>">[ X ]</a>
					<?php echo $property['p_id']; ?>
					<!--end for Admin-->
					
				</div> 
			</small><?php echo word_limiter($property['description'], 10); ?>
		
		
		<br><br>
		<p><a class="btn btn-default btn-sm" href="<?php echo base_url('/property/view/'.$property['p_id'].'/'.url_title(mb_substr($property['title'], 0, 29))); ?>">Read More</a></p>
		</div>
		<div class="col-md-2">
			</br>
			in : <?php echo $property['country'].'/'.$property['city']; ?></br>
	 		price : <?php echo $property['price']; ?></br>
	 		For <?php echo $property['rent_sale']; ?></br>
	 		
	 		<?php if($property['contact_by'] == "by_email_or_mobile"){ ?>
	 		mobile : <?php echo $property['mobile']; ?></br>
	 		emaile : <?php echo $property['email']; ?></br>
	 		<?php }	 elseif ($property['contact_by'] == "byemail"){ ?>
	 		emaile : <?php echo $property['email']; ?></br>
	 		<?php }	 elseif ($property['contact_by'] == "bymobile"){ ?>
	 		mobile : <?php echo $property['mobile']; ?></br>
	 		<?php }	?>
	 		
	 	</div>
	</div>
<br>
<?php endforeach; ?>
<br>
<div class="pagination-links">
	<?php echo $this->pagination->create_links(); ?>
</div>
<!--<form action="<?php //echo base_url('/property/main/') ?>" method="POST">-->
<!--	<select name='number'>-->
<!--		<option value="5">5</option>-->
<!--		<option value="10">10</option>-->
<!--		<option value="50">50</option>-->
<!--	</select>-->
<!--	<input type="submit" value="enter"/>-->
<!--</form>-->