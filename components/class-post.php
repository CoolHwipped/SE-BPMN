class Post{
  //attributes are anything pulled from the wp_postings_posts table
	private $attributes;
	public function __construct($rowObj){
		//the attributes are an associative array so if you want the
		//job title it is the same as the name of the attribute in the database
		$attributes = $rowObj;
	}

	public function getTitle(){
		return $attributes->title;
	}
	public function getCategory(){
		return $attributes->category;
	}
	public function getDepartment(){
		return $attributes->department;
	}
	
}
