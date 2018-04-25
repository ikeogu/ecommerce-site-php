<?php include('includes/connect.php');?>
<?php include('includes/session.php'); 
//include('announce2.php');
include('functions.php');
        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
        $limit = 2;
        $startpoint = ($page * $limit) - $limit;
        
        //to make pagination
        $statement = "`tb_announcement`";
        
        
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
   <link rel="shortcut icon" href="img/aalogo.jpg">

    <title>AA2000 Security and Technology Solution Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<!-- Less styles  
	<link rel="stylesheet/less" type="text/css" href="less/bootsshop.less">
	<script src="less.js" type="text/javascript"></script>
	 -->
	 
    <!-- Le styles  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>

	<link href="assets/css/docs.css" rel="stylesheet"/>
	 
    <link href="assets/style.css" rel="stylesheet"/>
	<link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>

	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
     <style>
   body {
    background-image: url("background1.JPG");
    background-repeat: repeat;
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
					<a id="logoM" href="user_index.php"><img src="" /></a>
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
               
        
					</ul>
                   
                    <ul class="nav pull-right">
                    <li class="active">
						<a href="user_account2.php"><?php $query = mysql_query("select * from customers where customer_id='$ses_id'") or die(mysql_error());
                $row = mysql_fetch_array($query); ?> 
                <b>Welcome!  </b> <?php echo $row['Firstname'];?> <?php echo $row['Lastname'];?> <span class="badge badge-info"> <?Php include('announce.php');?></span></a>
				
					<li>
						<a href="logout.php"><i class="icon-off"></i> Log Out</a>
					</li>
					</ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>
            
             
             <div class="container">
             <div class="row row-offcanvas row-offcanvas-right">
      
           <div class="well">
            <center><h2>AA2000 Security and Technology Solution Inc.</h2></center>
          </div><br />
<div class="well pull-right">
<a href="user.php"><i class="icon-cog"></i> <font color="blue">Profile Account</font></a><br />
<a href="Email.php"><i class="icon-envelope"></i> <font color="blue">Email sent</font></a>
</div>

      
<div class="container">

            <?php
      
                $query = mysql_query("select * from tb_announcement {$statement} LIMIT {$startpoint} , {$limit}   ") or die(mysql_error());
                while ($row = mysql_fetch_array($query)) {
         ?>
<br />

        <div class="well row">

           
            <div>
                <a href="announcement_detail.php?id=<?php echo $row['announcementID']; ?>">
                    <img src="server/ADMIN/SERVER/ADS/<?php echo $row['image'];?>" width="250" height="250" class="img-responsive"/>
                </a>
            </div>
            <div class="col-md-6">
                <h3><a href="announcement_detail.php?id=<?php echo $row['announcementID']; ?>"><?php echo $row['name'];?></a>
                </h3>
                <p>Date: <?php echo date("F j, Y - h:i A ", strtotime($row['date'])) ?></p>
                <p>
                       <?php $string=$row['detail'];
                        $string = strip_tags($string);
                        if (strlen($string) > 100) {

                        // truncate string
                            $stringCut = substr($string, 0, 200);
                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
                                                    }
                        echo $string ."...";
                    ?>
                </p>
                <a class="btn btn-primary" href="announcement_detail.php?id=<?php echo $row['announcementID']; ?>">Read More <i class="fa fa-angle-right"></i></a>
            </div>

        </div>
        <br/><br/>
             <?php } ?>

            <div class="col-lg-12">
                <ul class="pagination">
                     <?php
    echo pagination($statement,$limit,$page);
?>      
                </ul>
            </div>

      
</div>

          
        </div><!--/span-->
        
</div>
</div></body>