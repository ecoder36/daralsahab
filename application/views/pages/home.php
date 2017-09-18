<h2><?= $title ?></h2>
<p>أهلا وسهلا بك في الصفحة الرئيسية</p>




<div class="row">
    <div class="col-md-3 col-md-offset-0">
		<h1 class="text-center"><?= $title; ?></h1>
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" placeholder="Name">
		</div>
		<div class="form-group">
			<label>Zipcode</label>
			<input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" placeholder="Username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
		</div>
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
	<div class="col-md-8 col-md-offset-1">
		<h1 class="text-center"><?= $title; ?></h1>

<div class="row">
	 	<div class="col-md-4">
			<img class="post-thumb" src="http://www.imgworlds.com/wp-content/uploads/2015/11/img-blvd.jpg">
		</div>
		<div class="col-md-8 ">
		     
			<small class="post-date"><strong><?= $title; ?></strong> Posted on: 27/5/2017  <strong><div class="pull-right"> makkah</div> </strong></small>
		<?php echo word_limiter('Spanish style, pet friendly,
		smoke free apartments and townhomes in Miami. Updated homes with GE energy 
		saving appliances and breakfast bars. Pool, fitness center, clubhouse, playground,
		and picnic area. Guarantors welcome.', 20); ?>
		<br><br>
		<p><a class="btn btn-default btn-sm" href="<?php echo site_url('/posts/'.'slug'); ?>">Read More</a></p>
		</div>
	</div>
	
<br>

	<div class="row">
	 	<div class="col-md-4">
			<img class="post-thumb" src="http://www.imgworlds.com/wp-content/uploads/2015/11/img-blvd.jpg">
		</div>
		<div class="col-md-8 ">
		     
			<small class="post-date"><strong><?= $title; ?></strong> Posted on: 27/5/2017  <strong><div class="pull-right"> makkah</div> </strong></small>
		<?php echo word_limiter('Spanish style, pet friendly,
		smoke free apartments and townhomes in Miami. Updated homes with GE energy 
		saving appliances and breakfast bars. Pool, fitness center, clubhouse, playground,
		and picnic area. Guarantors welcome.', 20); ?>
		<br><br>
		<p><a class="btn btn-default btn-sm" href="<?php echo site_url('/posts/'.'slug'); ?>">Read More</a></p>
		</div>
	</div>

<br>

<p><strong>Note:</strong> The article tag is not supported in Internet Explorer 8 and earlier versions.</p>
	</div>
</div>