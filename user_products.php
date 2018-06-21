<?php
 include('includes/session.php'); 
 include_once 'includes/product.php';
 include ('user_header.php');
 if(!($session->is_logged_in())) redirect('login.php');
 $products = Product::panel();
 echo $products;
?>
  <hr class='soft'>
  <div  id='footerSection' class='thumbnail'>
  	<?php include('footer.php');?>
  </div>
  </div>
  </body>