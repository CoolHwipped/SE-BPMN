<form id="sorting_options" method="POST" action="admin.php?page=view_page">
	<div>
		<label for="sortable">Sort by: </label>
		<select name="sortable" id="sortable">
			<option <?php if($sortable=='department'){echo 'selected="selected"'; } ?> value="department">Department</option>
			<option <?php if($sortable=='payrate'){echo 'selected="selected"'; } ?> value="payrate">Pay Rate</option>
			<option <?php if($sortable=='date_posted'){echo 'selected="selected"'; } ?> value="date_posted">Date Posted</option>
		</select>

		<label for="order">Order by: </label>
		<select name="order" id="order">
			<option <?php if($order =='asc'){echo 'selected="selected"'; } ?> value="asc">Asc</option>
			<option <?php if($order =='desc'){echo 'selected="selected"'; } ?> value="desc">Desc</option>
		</select>
	</div>
</form>
<?php foreach ($posts as $key => $post){ ?>
	<?php if($key != 'size'){ ?>
		<div class='jumbotron'>
			<h2><?php echo $post->title ?></h2>
			<span class='hide-content' style='display: none;'>
				<p>Description: <?php echo $post->content; ?></p>
				<p>Department: <?php echo $post->department; ?></p>
				<p>Pay rate: <?php echo $post->payrate; ?></p>
				<p>Date Posted: <?php echo $post->start_date; ?></p>
				<p><h4>Contact details</h4>
				<div>Name: <?php echo $post->contact_name ?></div> 
				<div>Email: <?php echo $post->contact_email ?></div> 
				<div>Phone: <?php echo $post->contact_phone ?></div> 
				</p>
			</span>
			<p><button class='btn-primary toggle-content'>More Information</button></p>
		</div>
	<?php } ?>
<?php } ?>
