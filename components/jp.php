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
}
