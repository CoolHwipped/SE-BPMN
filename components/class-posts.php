<?php

class posts
{
	function __construct()
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

			$this->$x = new post($post);
			$x++;
		}
		$this->size = $x-1;
	}
	 
	public function bubble_sort($topic, $order)
	{
		$count = $this->size;
		for ($i = 0; $i < $count; $i++)
		{
			for ($ii = 0; $ii < $count; $ii++)
			{
				$plus_1 = $ii + 1;
				if ($topic == 'department')
				{
					if ($order == 'asc')
					{
						if ( strcmp(strtolower($this->$ii->department), strtolower($this->$plus_1->department)) < 0 )
						{
							$temp = $this->$plus_1;
							$this->$plus_1 = $this->$ii;
							$this->$ii = $temp;
						}
					}
					else
					{
						if ( strcmp(strtolower($this->$ii->department), strtolower($this->$plus_1->department)) > 0 )
						{
							$temp = $this->$plus_1;
							$this->$plus_1 = $this->$ii;
							$this->$ii = $temp;
						}
					}
				}
				else if ($topic == 'payrate')
				{
					if ($order == 'asc')
					{
						if($this->$plus_1->payrate < $this->$ii->payrate){
							$temp = $this->$plus_1;
							$this->$plus_1 = $this->$ii;
							$this->$ii = $temp;							
						}	
					}
					else
					{
						if($this->$plus_1->payrate > $this->$ii->payrate){
							$temp = $this->$plus_1;
							$this->$plus_1 = $this->$ii;
							$this->$ii = $temp;							
						}	
					}
				}
				else if ($topic == 'date_posted')
				{
					$this_one = strtotime($this->$ii->start_date);
					$next_one = strtotime($this->$plus_1->start_date);
					if ($order == 'asc')
					{
						if($this_one < $next_one)
						{
							$temp = $this->$plus_1;
							$this->$plus_1 = $this->$ii;
							$this->$ii = $temp;
						}
					}
					else
					{
						if($this_one > $next_one)
						{
							$temp = $this->$plus_1;
							$this->$plus_1 = $this->$ii;
							$this->$ii = $temp;
						}
					}

				}
			}
		}
	}	 

}
