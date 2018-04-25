
<table width="795" align="center"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Brands Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="skyblue">
		<th>Brand ID</th>
		<th>Brand Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/connection.php");
	
	$get_brand = "SELECT * from brands";
	
	$run_brand = mysql_query($con, $get_brand); 
	
	$i = 0;
	
	while ($row_brand=mysql_fetch_array($run_brand)){
		
		$brand_id = $row_brand['brand_id'];
		$brand_title = $row_brand['brand_title'];
		$i++;
	
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $brand_title;?></td>
		<td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
		<td><a href="delete_brand.php?delete_brand=<?php echo $brand_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>




</table>