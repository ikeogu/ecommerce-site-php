<?php
include("functions.php");
include("style.php");
include_once 'includes/product.php';
include_once 'includes/customer.php';
?>
<body>

<?php

getheader();
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
			<!-- Grid items -->
		           
<?php
	if(isset($_GET['search'])){
	
	$search_query = $_GET['user_query'];
	
	$get_pro = "SELECT * from products where keywords like '%$search_query%'";

	$run_pro = mysql_query($con, $get_pro); 
	
	while($row_pro=mysql_fetch_array($run_pro)){
	
		$pro_id = $row_pro['id'];
		$pro_cat = $row_pro['cat'];
		$pro_brand = $row_pro['brand'];
		$pro_title = $row_pro['title'];
		$pro_price = $row_pro['price'];
		$pro_image = $row_pro['image'];	   
	
	echo " 
	                     
				<div class='grid__item shirts'>
				<div class='slider'>
					<div class='slider__item'><img src='productimages/$image'/></div>
					<div class='slider__item'><img src='productimages/$image'/></div>
					<div class='slider__item'><img src='productimages/$image'/></div>
					
				</div>
				<div class='meta'>
					<h3 class='meta__title'>$pro_title</h3>
					
					<span class='meta__price'>Price: RS $pro_price </span>
					<h3 class='meta__title'><a href='details.php?pro_id=$pro_id'>Details</a></h3>
					
					
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
