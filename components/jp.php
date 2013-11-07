<?php
class jp
{
	public function contactExists($contact_args)
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "job_postings_contact_info";
		$email= strtolower($contact_args->email);
		$sql = "SELECT id from $table_name WHERE email = '$email'";
		$results = $wpdb->get_results($sql);
		$id = $results[0]->id;
		if (empty($id))
		{
			return null;
		}
		else
		{
			return $id;
		}
	}
	public function getContact($id)
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "job_postings_contact_info";
		$sql = "SELECT * FROM $table_name WHERE id = $id";
		return $wpdb->get_results($sql);
	}

	public function getDescription($id)
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "job_postings_description";
		$sql = "SELECT * FROM $table_name WHERE id = $id";
		return $wpdb->get_results($sql);
	}
	public function getPosts()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "job_postings_posts";
		$today = date("Y-m-d");
		$sql = "SELECT * FROM $table_name WHERE $today <= date_expire";
		return $wpdb->get_results($sql); 
	}
	public function test(){
		echo 'test';
	}
	//used for testing purposes currently
	public function getNewPost(){
		$newArray = array($this->title, $this->category, $this->expiration_date, $this->department, $this->job_description,$this->job_title,$this->pay_rate,$this->email,$this->app_link);
		echo $newArray[0]. " -> ".$newArray[1]. " -> ".$newArray[2]. " -> ".$newArray[3]. " -> ".$newArray[4]. " -> ".$newArray[5]. " -> ".$newArray[6]. " -> ".$newArray[7]. " -> ".$newArray[8] ;	
	}
	public function queryPosts($orderedBy = null,$limit = 0,$ASC = true){
		//$orderedBy is the column to order a post by
		//$limit is to put a restraint on the number of posts to show
		//ASC is the posts are in ascending order if true descending if false
		global $wpdb;
		$query = 'SELECT title,category,department
					FROM wp_job_postings_posts';	
		if($orderedBy != null){
			$query .= ' ORDER BY '.$orderedBy.' ASC ';
			if($ASC){
				$query .= ' ASC ';
			}
			else{
				$query .= ' DESC ';
			}
		}
		if($limit != false && $limit > 0)	$query .= ' LIMIT '.$limit;
		$query .= ';';
		//pulls results
		$ret = $wpdb->get_results($query,OBJECT);
		//if $ret fails return false
		if(!$ret)	return false;
		else	return $ret;
	}
}
