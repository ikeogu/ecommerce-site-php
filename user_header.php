<?php 
include_once('includes/session.php');
include_once('includes/orderdetails.php');
if(!($session->is_logged_in())) redirect('login.php');
?>


<!DOCTYPE html>
<html lang="en">
    <head>
		<title>products</title>
        <!-- ALL STYLESHEET -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style2.css" rel="stylesheet">
		
    </head>   
	<body>
		
		<!-- header -->
		<header class="header">
			
				
			<!-- logo and adds -->
			<div class="logo-add">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="logo"><i class="fa fa-diamond"></i>Heldy - products</div>
						</div>
						<div>
								<?php 

									$count = count(Orderdetails::where(array('customer_id' => $session->user_id )));
		
								echo "<div class='pull-right'> <br/>
								  <a title='Click to view your cart!' href='product_summary.php'> <span class='btn btn-mini btn-success'> <i class='icon-shopping-cart icon-white'></i> <small>your cart has $count items</small> </span> </a>
								  <a title='Click to view your cart!' href='product_summary.php'>
								    <span class='btn btn-mini active btn'>check cart</span></a>
								</div>";
								?>
						</div>
					</div>
				</div>
			</div>
			

			<!-- header bottom -->
			<div class="header-bottom">
				<div class="row">
					<div class="col-sm-12">
						<nav class="navbar navbar-default">
							<div class="container">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-bottom" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="header-bottom">
									<ul class="nav navbar-nav">
										<li><a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home</a></span>
											
										</li>
										<li class=""><a href="user_products.php"><i class="icon-flag"></i>products</a></li>
										<li class=""><a href="product_summary.php"><i class="icon-flag"></i> Chart</a></li>
										<li class=""><a href="logout.php"><i class="icon-flag"></i> Logout</a></li>
									<li><a href="contact.php">Contact Us</a></li>
									</ul>
									<form class="navbar-form navbar-right" role="search">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Search...">
											<span class="nav-search"><a href="#"><i class="fa fa-search"></i></a></span>
										</div>	
									</form>
								</div>
							</div>
						</nav>
					</div>	
				</div>	  
			</div>	

		</header>
		

		
 <!-- ALL JAVASCRIPT -->  
 
    <script type='text/javascript'  language="Javascript">

  var qty=document.getElementById('qty').value;
     var qleft=document.getElementById('qleft').value;
  
    function OnChange(value){

    
    if (+qty > +qleft) {
         alert("Order Quantity Exceeds.");
         document.getElementById('qty').value='';
    
  }
  

  
    }

</script>       
    <script src='js/jquery.js'></script>
    <script src='bootstrap/js/bootstrap.min.js'></script>
    <script src='js/custom.js'></script>
</body>
</html>