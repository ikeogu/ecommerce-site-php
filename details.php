<?php
include("functions.php");
include("style.php");

?>
<body>

<?php
require ("header.php");
?>
<?php
getnav();
?>

<body >
	<!-- Bottom bar with filter and cart info -->
	<div class="bar">
		<div class="filter">
			<span class="filter__label">BOOKS CATEGORY: </span>
            <button class="action filter__item filter__item--selected" data-filter="*"><?php getcats(); ?></button>
			
		</div>
        
        <br>
        
        <div class="filter">
			<span class="filter__label">AREAS: </span>
            	<button class="action filter__item filter__item--selected" data-filter="*"><?php getbrands(); ?></button>		
		</div>
		<button class="cart">
			<i class="cart__icon fa fa-shopping-cart"></i>
			<span class="text-hidden">Shopping cart</span>
			<span class="cart__count">0</span>
		</button>
	</div>
	<!-- Main view -->
	<div class="view">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			<h1>Placement Assured Book Section </h1>
           

<h4 align="left">
SHOPPING CART DETAILS:
</h3>
Total items: <?php total_items(); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Total Price: <?php  total_price();?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


			
		</header>
		<!-- Grid -->
		<section class="grid grid--loading">
			<!-- Loader -->
			<img class="grid__loader" src="images/grid.svg" width="60" alt="Loader image" />
			<!-- Grid sizer for a fluid Isotope (Masonry) layout -->
			<div class="grid__sizer"></div>


<?php 

if(isset($_GET['product_id']))
{
$product_id=$_GET['product_id'];	
	               
$get_pro="SELECT * from products where product_id='$product_id' ";

$run_pro=mysql_query($con,$get_pro);

while($row_pro=mysql_fetch_array($run_pro))
{
	$pro_id=$row_pro['product_id'];
	
	$pro_title=$row_pro['product_title'];
	$pro_price=$row_pro['product_price'];
	
	$pro_image=$row_pro['product_image'];
	
	$pro_desc=$row_pro['product_desc'];
	
	echo " 
	                       
								
								
								
								
								
								<div class='grid__item shirts' align='center'>
				<div class='slider' align='center'>
					<div class='slider__item'><img src='admin_area/product_images/$pro_image' height='200px' width='200px'/></div>
					<div class='slider__item'><img src='admin_area/product_images/$pro_image'/></div>
					<div class='slider__item'><img src='admin_area/product_images/$pro_image'/></div>
					
				</div>
				<div class='meta'>
					<h3 class='meta__title'>$pro_title</h3>
					
					<span class='meta__price'>Price: RS $pro_price </span>
					<h3>$pro_desc</h3>
		            <h5><a href='index.php'>Go BACK</a></h5>
					<h3 class='meta__title'><a href='books/index.html'>Try Preview</a><h3>
					
					
				</div>
				<button class='action action--button action--buy'><i class='fa fa-shopping-cart'></i><span class='text-hidden'><a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a></span></button>
			</div>
								
								
								
      
	
	";
}
	
    
}
?>                
                
            
		</section>
		<!-- /grid-->
	</div>






    

<?php

cart();
?>
<?php

getIp();
?>

            
                
                
            
<?php

getscripts();
?>
</body>

</html>
