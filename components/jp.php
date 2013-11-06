<?php
class jp
{
	public function test(){
		echo 'test';
	}
	var	$title;
	var	$category;
	var	$expiration_date;
	var	$department;
	var	$job_description;
	var	$job_title;
	var	$pay_rate;
	var	$email;
	var	$app_link;
	
	public function createPost($newTitle,$newCat,$newExp,$newDept,$newJD,$newJT,$newPR,$newEmail,$newApplink){
		$this->title = $newTitle;
		$this->category = $newCat;
		$this->expiration_date = $newExp;
		$this->department = $newDept;
		$this->job_description = $newJD;
		$this->job_title = $newJT;
		$this->pay_rate = $newPR;
		$this->email = $newEmail;
		$this->app_link = $newApplink;
		//Still working on combining the tables 
		/*
		$sql = "INSERT INTO $wpdb->job_postings_description (
			title,
			category,
			GETDATE(),
			DATEADD(day,expiration_date,GETDATE()),
			department,
			0,
			0,
			0
		)"
		*/
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
