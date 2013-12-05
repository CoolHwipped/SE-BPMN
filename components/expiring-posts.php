<?php

class expiring_posts
{
	function __construct($time = 5)
	{
		global $wpdb;
		$table = "";
		$expire_row_name = "";
		$today = DATE("Y-m-d");
		$sql = "SELECT * FROM $table WHERE DATEDIFF(day, $today, $table.$expire_row_name) <= $time";
		$this->data = $wpdb->get_results($sql);
	}	
}
