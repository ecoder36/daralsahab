<a class="btn btn-default pull-right" href="<?php echo base_url(); ?>worker/edit/<?php echo $post['id']; ?>">Edit</a>
<a class="btn-link text-danger pull-right" href="<?php echo base_url(); ?>worker/delete/<?php echo $post['id']; ?>">Delete</a>

<h2><?php echo $post['id']; ?><?php echo $post['name']; ?></h2>

<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>

<div class="post-body">
	<?php echo $post['name']; ?>
</div>


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