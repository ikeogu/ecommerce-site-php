<?php include('include/connect.php');
//include('include/session.php');
function formatMoney($number, $fractional=false) {
                if ($fractional) {
                  $number = sprintf('%.2f', $number);
                }
                while (true) {
                  $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                  if ($replaced != $number) {
                    $number = $replaced;
                  } else {
                    break;
                  }
                }
                return $number;
              } 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/aalogo.jpg">

    <title>AA2000 Security and Technology</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<!-- Less styles  
	<link rel="stylesheet/less" type="text/css" href="less/bootsshop.less">
	<script src="less.js" type="text/javascript"></script>
	 -->
	 
    <!-- Le styles  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet"/>
	<link href="assets/css/docs.css" rel="stylesheet"/>
	 
    <link href="style.css" rel="stylesheet"/>
	<link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>

    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
  <script src="js/incrementing.js"></script>
	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
     <style>
   body {
    background-image: url("background1.JPG");
    background-repeat: no-repeat;
}
</style>
    <!-- Le fav and touch icons -->
 </head>
<body>
  <!-- Navbar
    ================================================== -->
<div class="navbar navbar-fixed-top">
              <div class="navbar-inner">
                <div class="container">
					<a id="logoM" href="user_index.php"><img src="" alt=""/></a>
                  <a data-target="#sidebar" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <div class="nav-collapse">
                    <ul class="nav">
			 <li class=""><a href="user_index.php"><i class="icon-home icon-large"></i> Home</a></li>
					  <li class=""><a href="user_products.php"><i class=" icon-th-large icon-large"></i> Products</a></li>
					  <li class=""><a href="user_contact.php"><i class="icon-signal"></i> Contact Us</a></li>
                      <li class=""><a href="user_aboutus.php"><i class="icon-flag"></i> About Us</a></li>
               <li class=""><a href="user_order.php"><i class="icon-shopping-cart"></i> Ordered Products</a></li>
               <li class=""><a href="Email.php"><i class="icon-envelope"></i> Email</a></li>
					</ul>
                   
                    <ul class="nav pull-right">
				      <li>
            <a href="user_account.php"><?php $query = mysql_query("select * from customers where CustomerID='$ses_id'") or die(mysql_error());
                $row = mysql_fetch_array($query);
                $id = $row['CustomerID']; ?> <b>Welcome!</b> <?php echo $row['Firstname'];?> <?php echo $row['Lastname'];?></a>
          </li>
          <li>
            <a href="logout.php">Log Out</a>
          </li>
					</ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>
<!-- ======================================================================================================================== -->	
<div id="mainBody" class="container">
<div class="well"><?php include ('user_header.php'); ?></div>
<!-- ==================================================Header End====================================================================== -->
<?php 
$get_id=$_GET['id'];
$query3=mysql_query("select * from order_details where orderdetailsid='$get_id'") or die (mysql_error());
$count2=mysql_num_rows($query3);
?>

<?php
                                    if (isset($_POST['submit'])) {

                                        $id = $_GET['id'];
                                        $qty = $_POST['quantity'];
                                        $tos = $_POST['quantity']*$_POST['total'];
                                        $date=date("Y-m-d");

                         mysql_query("update order_details set
                          Quantity='$qty',Total='$tos' where Orderdetailsid='$id'") 
                     or die(mysql_error());
                                            ?>

                                              <script type="text/javascript">
                                                alert("Quantity updated");
                                                window.location= "product_summary.php";
                                            </script>


                                            <?php
                                    }
                                    ?>
<font color="white">
<form method="post">


  <h3>  SHOPPING CART [ <small><?php echo $count2;?> </small>]
  <button type="submit" name="submit" class="btn btn-success">Update</button> 
  </h3>  
  <hr class="soft"/>
  
  <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th  width="100">Quantity/Update</th>
                  <th  width="80">Price</th>
                  <th width="80">Total</th>
        </tr>
              </thead>
              <tbody>
                <?php 
                       $id = $_GET['id'];
$query=mysql_query("select * from order_details where Orderdetailsid='$id'") or die (mysql_error());
$row=mysql_fetch_array($query);
$count=mysql_num_rows($query);
$pid=$row['ProductID'];
$query2=mysql_query("select * from tb_products where productID='$pid'") or die (mysql_error());
$row2=mysql_fetch_array($query2);
$qty=$row2['quantity'];

?>
        <tr>


                  <td> <img width="60" src="server/ADMIN/SERVER/AS/<?php echo $row2['image'];?>" alt=""/></td>
                  <td><b><?php echo $row2['name'];?></b><br/><br/>
                    <?php $string=$row2['details'];

$string = strip_tags($string);

if (strlen($string) > 100) {

    // truncate string
    $stringCut = substr($string, 0, 100);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="user_product_details.php?id='.$pid.'"><span style="color:red">Read More</span></a>'; 
}
echo $string;

                    ?></td>
          <td>
      <div class="input-append">
      <?php
	echo "<select class='span2' name='quantity' id='qty'>";
$i=1; $quant=$qty;
while ($i <= $quant ){
    echo "<option value=".$i.">".$i."</option>";
    $i++;
}
echo "</select>";
?>

     </div>


          </td>
                  <td><?php  echo formatMoney($row2['price'],2); ?></td>
                  <td><?php echo formatMoney($row['Total'],2);?></td>
              <input type="hidden" name="total" value="<?php echo $row2['price'];?>">
                </tr>
        
 
        </tbody>
            </table>
    
    
           
        
  <a href="product_summary.php" class="btn btn-large"><i class="icon-arrow-left"></i> Cancel </a>

</form>
<!-- Footer ------------------------------------------------------ -->
<hr class="soft">
<div class="well" id="footerSection">
	<?php include('footer2.php');?>
</div>
</font>
</body>