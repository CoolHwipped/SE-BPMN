<div class='wrap'>
	<!-- create form -->
	<form name="create_post" method="POST"  >
		<strong>Title of Post:</strong>
			<input type="text" name="post_title" size="100"/>
			<br /><br />
		<strong>Job Title:</strong>
		<input type="text" name="job_title" size="75"/>
			<br /><br />
		<strong>Category:</strong>
		<input type="text" name="cat" size="75"/>
			<br /><br /> 
		<strong>Expiration Date:</strong>
			<select name="time_length">
				<option value="timeLength_option_empty">&nbsp;</option>
				<option value="30">30 days</option>
				<option value="60">60 days</option>
				<option value="90">90 days</option>
			</select>
			<br /><br />	
			<strong>Department:</strong>
		<input type="text" name="dept" size="75"/>
			<br /><br />
		
		<strong>Job Description:</strong><br />
			<textarea name="job_description" maxlength="200"></textarea>
			<br /><br />
		
		<strong>Pay Rate:</strong>
		<input type="text" name="pay_rate" size="5"/>
			<br /><br />
		<strong>Application Link:</strong>
		<input type="text" name="app_link" size="5"/>
			<br /><br />    
			<br /><br />    
		<strong>Your contact Information:</strong>
			<br /><br />    
		<label for="name">Your name</label>
		<input type="text" id="name" name="name" size="20"/>
			<br /><br />    
		<label for="email">Your email address</label>
		<input type="text" name="email" id="email" size="20"/>
			<br /><br />    
		<label for="phone">Best number to contact you at</label>
		<input type="text" name="phone" id="phone" size="11"/>
			<br /><br />    
		<label for="job_desc">Your job description, tell the inquirer a little about what you do.</label>
			<br />
		<textarea name="job_desc" id="job_desc" maxlength="200"></textarea>
			<br /><br />    
		<input type="submit" value="Post Job"  >
	</form>
</div>
