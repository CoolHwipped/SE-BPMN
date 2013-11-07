<?php

class description
{
	function __construct($id)
	{
		$attributes = getDescription($id);

		foreach($attributes as $key => $attribute)
		{
			$this->$key = $attribute;
		}
	}

	public function save()
	{
		// TODO: add saving
	}

	public function delete()
	{
		// TODO: add deleting
	}

}
