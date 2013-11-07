<?php

class contact
{
	function __construct($contact_args)
	{
		foreach($contact_args as $key => $attribute)
		{
			$this->$key = $attribute;
		}
	}

	public function save()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . "job_postings_contact_info";
		$keys = array();
		$values = array();
		foreach($this as $key => $value)
		{
			array_push($keys, $key);
			array_push($values, $value);
		}
		if ($id = jp::contactExists($this) && !$this->id)
		{
			$this->id = $id;
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

			$sql = "SELECT id FROM $table_name WHERE email = '$this->email'";
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
		return $this->id;
	}

	function get($id)
	{
		$attributes = jp::getContact($id);
		foreach($attributes as $key => $attribute)
		{
			$this->$key = $attribute;
		}
	}
	public function delete()
	{
		// TODO: add deleting
	}


}
