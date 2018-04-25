<?php 
    include_once('includes/connect.php');
    include_once('includes/session.php');  
    include('includes/product.php');
    include('formatMoney.php');
    include ('includes/function.php');
    include ('includes/orderdetails.php');
    include ('user_header.php');


    $ordered_items = Orderdetails::where(array('customer_id' =>$session->user_id));
    foreach ($ordered_items as $key => $item) {
     $product = Product::find($item->product_id);
    }
?>

<!-- ======================================================================================================================== -->	
<div id="mainBody" class="container">
    <div class="thumbnail">
        <div class="well">
				
            <center>
	
    <?php
$ordered_items = Orderdetails::where(array('customer_id' =>$session->user_id));
	
						$session->user_id = mysql_query("select MAX(notifID) as max_notifID from notif");										
						$row = mysql_fetch_array($session->user_id);
						$orders=$row['max_notifID'] + 1; 

									$session->user_id = mysql_query("select MAX(OrderID) as max_OrderID from orders");										
						$row = mysql_fetch_array($session->user_id);
						$notifID=$row['max_OrderID'] + 1; 
                        
                        
                
                        
$query=mysql_query("select * from order_details where customer_id='$session->user_id' ") or die (mysql_error());
while($row3=mysql_fetch_array($query)){
$count=mysql_num_rows($query);
$pid=$row3['product_id'];
$qty= $row3['Quantity'];

$query2=mysql_query("select * from products where product_id='$pid'") or die (mysql_error());
$row2=mysql_fetch_array($query2);
$Quantity=$row2['Quantity'];


 mysql_query ("UPDATE products SET Quantity = Quantity - $qty 
            WHERE product_id ='$pid' and Quantity='$Quantity' ");
            
 

//date_default_timezone_set('US/Canada'); // CDT
  //date_default_timezone_set('Asia/Manila');
$current_date = date('Y-m-d');

			
		
			
				$cart_table = mysql_query("select  sum(total) from order_details where CustomerID='$ses_id' and Orderid=''") or die(mysql_error());
       $cart_count = mysql_num_rows($cart_table);
       
        while ($cart_row = mysql_fetch_array($cart_table)) {
            
            

		   $total = $cart_row['sum(total)'];
		   
           
		 
mysql_query("INSERT INTO orders (CustomerID, OrderID,orderdate,total,status) 
	VALUES('$ses_id','$orders', '$current_date','$total','Pending')");

mysql_query("INSERT INTO notif (notifID, orderID,date_ordered) 
	VALUES('$notifID','$orders','$current_date')");	

mysql_query("update order_details set OrderID='$orders' where CustomerID='$ses_id' and OrderID=''")or die(mysql_error());
mysql_query ("UPDATE order_details SET Total_qty =$Quantity - $qty WHERE ProductID ='$pid' and Total_qty='' ");
}
}
?>
            
        
        
        <?php
                        
$total1=$_POST['totas'];
$tax=$total1 * 0.12;
$transaction_code= "Heldy".$orders.$ses_id;
mysql_query("update orders set Transaction_code='$transaction_code' where CustomerID='$ses_id' and Transaction_code=''")or die(mysql_error());
mysql_query("update orders set tax='$tax' where CustomerID='$ses_id' and tax='0'");
$code=mysql_query("select * from orders where CustomerID='$ses_id' and total='$total1' and orderdate='$current_date' and Date_paid=''");
$row4=mysql_fetch_array($code);

$shipaddress=$_POST['shipaddress'];
$city=$_POST['city'];
$ADDRESS=$shipaddress .' '. $city;               
mysql_query("update orders set shipping_address='$ADDRESS' where CustomerID='$ses_id' and Transaction_code='$transaction_code'");   					  
  
?>


<form action="https://www.sandbox.paypal.com/cgi-bin/webscr"  method="post">
<input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="business" value="sabellorichmon-facilitator@yahoo.com" />
        <input type="hidden" name="item_name" value="<?php echo $row4['Transaction_code']; ?>" />
        <input type="hidden" name="item_number" value="<?php echo $count; ?>"/>
        <input type="hidden" name="amount" value="<?php echo $total1; ?>" />
        <input type="hidden" name="Quantity" value="1" />
        <input type="hidden" name="currency_code" value="PHP" />
        <input type="hidden" name="lc" value="GB" />
        <input type="hidden" name="bn" value="PP-BuyNowBF" /><br />
        <input type="hidden" name="shipping" value="150.00">
        <input type="hidden" name="shipping2" value="">
        <input type="hidden" name="tax" value="">
        <input type="hidden" name="handling_cart" value="">
        
        <div class="container">
        <input type="image" src="paypal.jpg" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!"  />
        
      
		</div>
        <!-- Payment confirmed -->
        <input type="hidden" name="return" value="" />
        <!-- Payment cancelled -->
        <input type="hidden" name="cancel_return" value="" />
        <input type="hidden" name="rm" value="2" />
        <input type="hidden" name="notify_url" value="" />
        <input type="hidden" name="custom" value="any other custom field you want to pass" />
    </form>
        
        
        
        
        
		<img  class="pull-left" src="paypalverified.jpg" /> 
        <h3>Payment through Paypal</h3>
        <h3>Company Name: Heldy products</br></h3>
        <h3>Thanks!</h3>
     
     <a href="user_products.php"><button type="button"  class="btn btn-success"><span class="icon-off"></span> Back</button></a> 
      </center>
</div>
<?php
	
    
?>

<!-- Footer ------------------------------------------------------ -->
<hr class="soft">
<div  id="footerSection" class="thumbnail">
	<?php include('footer2.php');?>
</div></div></body>