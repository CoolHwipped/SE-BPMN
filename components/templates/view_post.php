<table border="1">
	<tr>
		<td>Position</td>
		<td>Category</td>
		<td>department</td>
	</tr>
<?php
foreach($posts as $post)
{
?>
	<tr>
		<td><?php echo $post->title?></td>
		<td><?php echo $post->category?></td>
		<td><?php echo $post->department?></td>
	</tr>
<?php
}
?>
</table>
