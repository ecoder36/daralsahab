


<a class="btn btn-default pull-right" href="<?php echo base_url(); ?>contact/edit/<?php echo $post['id']; ?>">Edit</a>
<a class="btn-link text-danger pull-right" href="<?php echo base_url(); ?>contact/delete/<?php echo $post['id']; ?>">Delete</a>

<h2><?php echo $post['id']; ?><?php echo $post['name']; ?></h2>

<small class="post-date">Posted on: <?php // echo $post['created_at']; ?></small><br>

<div class="post-body">

		
			<?php  
			echo '<br>'.$post['id'];
			echo '<br>'.$post['name'];
			echo '<br>'.$post['mail'];
			echo '<br>'.$post['mobile'];
			echo '<br>'.$post['message'];
			
			?>
			
</div>