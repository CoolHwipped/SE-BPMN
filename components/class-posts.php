<?php

class posts
{
	function __construct()
	{
		$posts = jp::getPosts();
		$i=0;
		foreach($posts as $post){
			$this->$i = new post($post);
			$i++;
		}
	}
}
