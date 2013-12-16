<?php foreach ($posts as $post){ ?>
	<div class='jumbotron'>
		<h2><?php echo $post->title ?></h2>
		<span class='hide-content' style='display: none;'>
			<p>Description: <?php echo $post->content; ?></p>
			<p>Pay rate: <?php echo $post->payrate; ?></p>
			<p><h4>Contact details</h4>
			<div>Name: <?php echo $post->contact_name ?></div> 
			<div>Email: <?php echo $post->contact_email ?></div> 
			<div>Phone: <?php echo $post->contact_phone ?></div> 
			</p>
		</span>
		<p><button class='btn-primary toggle-content'>More Information</button></p>
	</div>
<?php } ?>
