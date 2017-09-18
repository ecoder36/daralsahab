

<a class="btn btn-default pull-right" href="<?php echo base_url(); ?>property/edit/<?php echo $post['p_id']; ?>">Edit</a>
<a class="btn-link text-danger pull-right" href="<?php echo base_url(); ?>property/delete/<?php echo $post['p_id']; ?>">Delete</a>

<h2><?php echo $post['p_id']; ?><?php echo $post['title']; ?></h2>

<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>

<div class="post-body">
	<?php echo $post['description']; ?>
</div>


<!--Images -->
<hr>
<h3>Images</h3>
<?php  if($files) : ?>
<table class="table">
	<tr>
		<?php foreach($files as $file) : ?>
		<td>
			<img width="128" height="128" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $file['file_name']; ?>"> &nbsp &nbsp&nbsp&nbsp<br><br>
		</td>
		<?php endforeach; ?>
	</tr>
</table>
<?php else : ?>
	<p>No images To Display</p>
<?php endif; ?>

	<hr>
	
<!--comments added on th 5th video-->
<hr>
<h3>Comments</h3>
<?php if($comments) : ?>
	<?php foreach($comments as $comment) : ?>
		<div class="well">
			<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
				<?php // if(isset($_SESSION['logged_in_1']) && $this->session->userdata('user_id') == $category['user_id']): ?>
					<form class="cat-delete" action="https://framework-testaa.c9users.io/advertisements/comments/delete/<?php echo $comment['id']; ?>" method="POST">
			 			<input type="submit" class="btn-link text-danger" value="[X]"/>
			 		</form>
		 		<?php // endif; ?>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>No Comments To Display</p>
<?php endif; ?>

<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['p_id']); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea name="body" class="form-control"><?php echo set_value('body'); ?></textarea>
	</div>
	<input type="hidden" name="id" value="<?php echo $post['p_id']; ?>">
	<button class="btn btn-primary" type="submit">Submit</button>
</form>
