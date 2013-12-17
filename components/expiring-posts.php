<?php

class expiring_posts
{
	function __construct($time = 5)
	{
		$args = array( 'post_type' => 'job_posting', 'post_status' => 'publish', 'posts_per_page' => 10 );
		$loop = new WP_Query( $args );
		$x = 0;	
		foreach ($loop->posts as $post)
		{
			$meta_values = get_post_meta( $post->ID );

			$post->payrate = $meta_values['job_postings_payrate'][0];	
			$post->end_date = $meta_values['job_postings_datepicker'][0];	
			$post->department = $meta_values['job_postings_department'][0];	
			$post->expiration_reminder = $meta_values['job_postings_expiration'][0];	
			$post->contact_name = $meta_values['job_postings_contact_name'][0];	
			$post->contact_email = $meta_values['job_postings_contact_email'][0];	
			$post->contact_phone = $meta_values['job_postings_contact_phone'][0];	

			$start = strtotime($post->post_date);
			$date = strtotime($post->end_date);
			$datediff = $date - $now;
			$date_diff = floor($datediff/(60*60*24));

			if ((($date_diff - $post->expiration_reminder) < 0) && ((time() - $date) > 0))
			{
				$this->$x = new post($post);
				$x++;
			}
		 
		}
		$this->size = $x;
	}	
}
