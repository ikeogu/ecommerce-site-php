<?php 

   include_once 'header.php';?>


          <h3><font color="green">List of Products</font> </h3> 
          
<?php 

        include_once 'includes/product.php';
        $show= Product::show();
        echo $show;
?>