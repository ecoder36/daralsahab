



<?php foreach($posts as $contact) : ?>
	<div class="row">
	 
		<div class="col-md-8 ">
			<small class="post-date">
				<?php 
				// 	$bd = $property['created_at'] ;$now = Date('d-m-Y H:i:s') ; 
    //                 $datetime1 = new DateTime($bd);$datetime2 = new DateTime($now);
    //                 $interval55 = $datetime1->diff($datetime2);
    //                 $since = $interval55->format('%a Days %h Hours %i Minute ');
                ?>
				<strong><?php echo $contact['name']; ?></strong> 
				Posted Since : <?php // echo $since ; ?> 
				<div class="pull-right">
					 
					<!--for Admin-->
				<br>	<a class="btn-link text-danger" href="<?php echo base_url(); ?>contact/delete/<?php echo $contact['id']; ?>">[ X ]</a>
				
					<!--end for Admin-->
					
				</div> 
			</small>
			
			<?php  
			echo '<br>'.$contact['id'];
			echo '<br>'.$contact['name'];
			echo '<br>'.$contact['mail'];
			echo '<br>'.$contact['mobile'];
			echo '<br>'.$contact['message'];
			
			?>
			
			
			<?php echo word_limiter($contact['message'], 10); ?>
		
		
		<br><br>
		<p><a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>contact/view/<?php echo $contact['id']; 
		
		// echo base_url('/contact/view/'.$contact['id'].'/'.url_title(mb_substr($contact['massege'], 0, 29))); ?>">Read More</a></p>
		</div>

	</div>
<br>
<?php endforeach; ?>