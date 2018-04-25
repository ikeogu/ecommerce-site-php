<?php 
	include_once"includes/Model.php"; 
	include_once "..includes/product.php";
	
	if(isset($_GET['delete_pro'])){
	
	$delete_id = $_GET['delete_pro'];
	
	$delete_pro = "DELETE from products where product_id='$delete_id'"; 
	
	$run_delete = mysql_query($con, $delete_pro); 
	
	if($run_delete){
	
	echo "<script>alert('A product has been deleted!')</script>";
	echo "<script>window.open('index.php?view_products','_self')</script>";
	}
	
	}





?>