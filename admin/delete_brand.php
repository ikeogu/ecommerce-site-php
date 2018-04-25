<?php 
	include("includes/connection.php"); 
	
	if(isset($_GET['delete_brand'])){
	
	$delete_id = $_GET['delete_brand'];
	
	$delete_brand = "DELETE from brands where brand_id='$delete_id'"; 
	
	$run_delete = mysql_query($con, $delete_brand); 
	
	if($run_delete){
	
	echo "<script>alert('A Brand has been deleted!')</script>";
	echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
	
	}





?>