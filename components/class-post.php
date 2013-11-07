<?php
class Post{
	public function __construct($attributes){
		//the attributes are an associative array so if you want the
		//job title it is the same as the name of the attribute in the database
		foreach($attributes as $key => $val)
		{
			$this->$key = $val;
		}
	}

	function __get($var){
		switch($var)
		{
			case("contact_info"):
				if (isset($this->contact_id))
				{
					$this->contact_info = getContact($this->contact_id);
				}
				break;
			case("description"):
				if (isset($this->description_id))
				{
					$this->description = getDescription($this->description_id);
				}
				break;
			default:
				break;
		}
	}

	public function save()
	{
		// TODO: add saving
		global $wpdb;
		$table_name = $wpdb->prefix . "job_postings_posts";
		$keys = array();
		$values = array();
		foreach($this as $key => $value)
		{
			array_push($keys, $key);
			array_push($values, $value);
		}
		if (!$this->id)
		{
			$key_str = "(";
			$value_str = "(";
			for ($i = 0; $i < count($keys) - 1; $i++)
			{
				$key_str .= $keys[$i] . ",";
				$value_str .= '"' .$values[$i] . "\",";
			}
			$key_str .= $keys[count($keys)-1] . ")";
			$value_str .=  '"' . $values[count($values)-1] . "\")";

			$sql = "INSERT INTO $table_name $key_str VALUES $value_str";
			$wpdb->query( $sql );

			$sql = "SELECT MAX(id) as id FROM $table_name";
			$results = $wpdb->get_results($sql);
			$this->id = $results[0]->id;
		}
		else
		{
			$sql = "UPDATE $table_name SET ";
			for ($i = 0; $i < count($keys) - 1; $i++)
			{
				$sql .= $keys[$i] . "=" . $values[$i] . ",";
			}	
			$sql .= $keys[count($values)-1] . "=" . $values[count($values)-1] . " WHERE id=$this->id";
			$wpdb->query( $sql );
		}
		die;
		return $this->id;
	}

	public function delete()
	{
		// TODO: add deleting
	}


}
