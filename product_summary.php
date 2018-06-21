<?php 
include('includes/session.php');
include('includes/product.php');
include ('includes/function.php');
include ('includes/orderdetails.php');
    require 'vendor/autoload.php';

 //if(isset($_GET) & !empty($_GET))
  //$product = Product::find($product_id);
 if(isset($_POST) & !empty($_POST)){
   $order = Orderdetails::instantiate($_POST);
   $product = Product::find($order->product_id);
   $order->computeOrderDetails($product->price);
   $order->customer_id = $session->user_id;
   $order->save();
   }
if (isset($_GET['product_id']) && isset($_GET['opt'])){
    $product = Product::find($_GET['product_id']);
    if($_GET['opt']==0 && $product)
      $product->delete();
    redirect ('product_summary.php');
  }
   $ordered_items = Orderdetails::where(array('customer_id' =>$session->user_id ));
   

   ?>




<!-- ======================================================================================================================== -->	
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
    




<div id="mainBody" class="container">
    <font color="black">

    <form method="post" action="product_summary.php">
      <h3>  SHOPPING CART [ <small><?php
        $count = count(Orderdetails::where(array('customer_id' => $session->user_id )));
        //var_dump($count); exit();
        echo $count;?> </small>]

     </h3>  
      <hr class="soft"/>
      
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Product</th>
            <th>Description</th>
            <th  width="100">Quantity</th>
            <th  width="80">Price</th>
            <th width="80">Total</th>
            <th width="100">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $row= '';
             $total = 0;
             if($ordered_items){
            foreach ($ordered_items as $key => $item) {
              # code...
              $item->Total/=100;
             $total += $item->Total;
             //$total/=100;
            
            $product = Product::find($item->product_id);
            $product->price/= 100;
            $strings =  $product->descr;
            $string = strip_tags($strings);

           if (strlen($string) > 20) {
              $stringCut = substr($string, 0, 10);
              $string = substr($stringCut, 0, strrpos($stringCut, ''))."... <a href='user_product_details.php?id=$item->product_id'><span style='color:blue'>Read More</span></a>";
            } 
            $row.= " <tr>
                          <td><img width='60' src='images/product/$product->logo'> </td>
                          <td>$product->title  <br/>   $string</td>
                          <td>$item->quantity</td>
                          <td>$product->price </td>
                          <td>$item->Total</td>
                          <td><a href='product_summary.php?id={$item->product_id}&opt=0'>
                            <button class='btn btn-info' onclick='return confirm('Are you sure you want to delete?')' type= 'button'>
                            <i class='icon-remove icon-white'></i> Remove</button></a></td>

                      </tr>    
            "; 
            }
            echo $row."<td colspan='5' align='right'><h4> TOTAL = $total</h4></td>";  
            }
                          
          ?> 
        </tbody>
      </table> 
      <div class="row"> 
        <div class="container">
          <div class="col col-lg-2">        
           
          <div class='row'>
                    <div class='col-lg-4 col-md-6'>
                      <a href='user_products.php'  type= 'button' class='btn btn-large btn-fill btn-success'> Continue Shopping<i class='icon-arrow-left'></i> </a>
                    </div>
                  </div> 
                
                
            </div>
            <div class="col col-md-8">
              <section class="thumbnail">
                <h4>Please make a choice!</h4>
              </section>
              
            </div>
              <div class="col col-lg-2">
              <a href="makepayment.php" type="button" class="btn btn-info btn-fill"> checkout</a>
            </div>
          </div>  
        </div>
       
</font>
</div>
<hr class="soft">
<div class="thumbnail" id="footerSection">
	<?php include('footer.php');?>
</div>