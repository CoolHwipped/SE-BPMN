<?php

class post
{
	function __construct($wp_post)
	{
		$this->id = $wp_post->ID;
		$this->title = $wp_post->post_title;
		$this->post_date = $wp_post->post_date;
		$this->post_title = $wp_post->post_title;
		$this->content = $wp_post->post_content;
		$this->payrate = $wp_post->payrate;
		$this->end_date = $wp_post->end_date;
		$this->department = $wp_post->department;
		$this->contact_phone = $wp_post->contact_phone;
		$this->contact_email = $wp_post->contact_email;
		$this->contact_name = $wp_post->contact_name;
	}

}
