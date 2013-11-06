<?php

global $wpdb;
$postTable = jp::queryPosts();
//get_results return an array of Objects, 
//each object representing a row from the query result
echo '<table border="1">
		<tr>
			<td>Position</td>
			<td>Category</td>
			<td>department</td>
		</tr>';
for($i = 0; $i < count($postTable); $i++){
	$postObj = $postTable[$i];
	//Attributes in $postObj, table, category, department
	echo '<tr>
			<td>'.$postObj->title.'</td>
			<td>'.$postObj->category.'</td>
			<td>'.$postObj->department.'</td>
		</tr>';
}
echo '</table>';
