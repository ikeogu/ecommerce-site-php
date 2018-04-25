<?php

function getheader()
{
echo "
<!DOCTYPE html>
<html lang='en' class='no-js'>
<head>
	<meta charset='UTF-8' />
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>Placement Assured Book Section</title>
	
	<link rel='shortcut icon' href='favicon.ico'>
	
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	
	<link rel='stylesheet' type='text/css' href='fonts/pixelfabric-clothes/style.css' />
	
	<link rel='stylesheet' type='text/css' href='css/demo.css' />
	 <!-- Flickity gallery styles -->
	<link rel='stylesheet' type='text/css' href='css/flickity.css' />
	
	<link rel='stylesheet' type='text/css' href='css/component.css' />
	<script src='js/modernizr.custom.js'></script>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</head>
";

}

function getnav()
{
echo "
<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='../../index.php'>Placement Assured</a>
    </div>
    <div>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='allproducts.php'>Books</a></li>
        
        <li><a href='customer/my_account.php'>My Account</a></li>
        <li><a href='cart.php'>Cart</a></li>
		<li style='padding-top:15'>
 
 <form method='get' action='results.php' enctype='multipart/form-data'>
 <input type='text' name='user_query' placeholder='search'>
 <input type='submit' name='search' value='search' />
 
 
 </form> 
 
</li>
      </ul>
      <ul class='nav navbar-nav navbar-right'>
        <li><a href='admin_area/index.php'><span class='glyphicon glyphicon-user'></span>Admin</a></li>
        
      </ul>
    </div>
  </div>
</nav>


";	
}

function getscripts()
{
	echo " 
	   
	   <script src='js/isotope.pkgd.min.js'></script>
	<script src='js/flickity.pkgd.min.js'></script>
	<script src='js/main.js'></script>
    <br>";
	
}

?>