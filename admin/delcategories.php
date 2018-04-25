<?php 
 
	include_once "../includes/Category.php";
	
	if(isset($_GET['delete_cat'])){
	
	$delete_id = $_GET['delete_cat'];
	
	$delete_cat = "DELETE from categories where cat_id='$delete_id'"; 
	
	$run_delete = mysql_query($con, $delete_cat); 
	
	if($run_delete){
	
	echo "<script>alert('A Category has been deleted!')</script>";
	echo "<script>window.open('index.php?view_cats','_self')</script>";
	}
	
	}





?>