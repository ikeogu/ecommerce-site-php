<?php 
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>

<?php

include("style.php");
?>
<?php
getheader();
?>
<?php
getnav();
?>

<body> 
<div class="container">
<div class="row">
<div class="col-md-3" align="left">


	<div class="list-group">
	
	
		
		
		
		<li class="list-group-item"><h2 style="text-align:center;">Manage Content</h2></li>
			
		<li class="list-group-item"><a href="index.php?insert_product">Insert New Product</a></li>
		<li class="list-group-item">	<a href="index.php?view_products">View All Products</a></li>
		<li class="list-group-item">	<a href="index.php?insert_cat">Insert New Category</a></li>
		<li class="list-group-item">	<a href="index.php?view_cats">View All Categories</a></li>
		<li class="list-group-item">	<a href="index.php?insert_brand">Insert New Brand</a></li>
		<li class="list-group-item">	<a href="index.php?view_brands">View All Brands</a></li>
		<li class="list-group-item">	<a href="index.php?view_customers">View Customers</a></li>
		<li class="list-group-item">	<a href="index.php?view_orders">View Orders</a></li>
		<li class="list-group-item">	<a href="index.php?view_payments">View Payments</a></li>
		<li class="list-group-item">	<a href="logout.php">Admin Logout</a></li>
		
		</div>
		</div>
		<div class="col-md-6" align="right">
		<h2 style="color:red; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
		<?php 
		if(isset($_GET['insert_product'])){
		
		include("insert_product.php"); 
		
		}
		if(isset($_GET['view_products'])){
		
		include("view_products.php"); 
		
		}
		if(isset($_GET['edit_pro'])){
		
		include("edit_pro.php"); 
		
		}
		if(isset($_GET['insert_cat'])){
		
		include("insert_cat.php"); 
		
		}
		
		if(isset($_GET['view_cats'])){
		
		include("view_cats.php"); 
		
		}
		
		if(isset($_GET['edit_cat'])){
		
		include("edit_cat.php"); 
		
		}
		
		if(isset($_GET['insert_brand'])){
		
		include("insert_brand.php"); 
		
		}
		
		if(isset($_GET['view_brands'])){
		
		include("view_brands.php"); 
		
		}
		if(isset($_GET['edit_brand'])){
		
		include("edit_brand.php"); 
		
		}
		if(isset($_GET['view_customers'])){
		
		include("view_customers.php"); 
		
		}
		
		?>
		</div>





</div>
	</div>


</body>
</html>

<?php } ?>