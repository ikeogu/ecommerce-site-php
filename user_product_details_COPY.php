<?php include('includes/connect.php');
include('includes/session.php');
include('formatMoney.php');
include_once 'includes/connect.php';
include_once 'includes/product.php';


if(isset($_GET) & !empty($_GET)){
  $product_id = $_GET['id'];
  $product = Product::find($product_id);
}else{
  header('location: user_products.php');
}


?><script type="text/javascript">
  
  var quantity=document.getElementById('qty').value;
     var qleft=document.getElementById('qleft').value;
  
    function OnChange(value){

    
    if (+quantity > +qleft) {
         alert("Order Quantity Exceeds.");
         document.getElementById('qty').value='';
    
  }
}
</script>
<?php include ('user_header.php');?>

    
  <div class="row">  
 
<font color="white">
      <div id="gallery" class="span3">
        <img src="images/product/<?php echo $product->logo;?>" width="20%" />
        
      </div>
     
        <h3 style="color: green;">&nbsp;&nbsp;&nbsp;<?php echo $product->title;?></h3>
        <hr class="soft"/>

        <?php
                                    if (isset($_POST['submit'])) {

                                           $product_id = $_GET['product_id']; 
                                           $product_id = $_POST['product_id']; 
                                        $id = $_POST['id'];
                                        $quantity = $_POST['quantity'];
                                            
                                         $price = $_POST['price'];                                     
                                        $total = $_POST['price'] * $_POST['quantity'];         

                                        $date=date("Y-m-d");

                                       
                         mysql_query("insert into order_details
                          (Orderdetailsid,product_id,Quantity,price,Total,CustomerID) values
                  ('$id','$product_id','$quantity','$price','$total','$ses_id')") 
                     or die(mysql_error());
                                            ?>

                                         
                                              <script type="text/javascript">
                                                alert("Product added to cart");
                                                    window.location= "user_products.php";
                                            </script>

                                            <?php
                                    }
                                    ?>

        <form class="form-horizontal qtyFrm" method="post" action="product_summary.php">
          <input type="hidden" id="username" name="product_id" value="
          <?php
             $id = mysql_query("select MAX(orderdetailsid) as max_orderdetailsid from order_details");          
             $row = mysql_fetch_array($product_id);
             echo $row['max_orderdetailsid'] + 1;           
          ?>" 
            class="input-xlarge" required style="color: green;"/>
          <div class="control-group">
          
            <label>
              <h3 style="color: green;">
                <span>&nbsp;&nbsp;&nbsp;Price: N<?php echo formatMoney($product->price,2);?></span>
              </h3>
            </label>
			
             <?php 
                $count_query = mysql_query("select * from order_details where CustomerID='$ses_id' and product_id='$product_id'") or die(mysql_error());
                $count = mysql_num_rows($count_query);
              if($count==0){
              ?>
             <input type="hidden" class="span1" name="price"  style="color: green;" value="<?php echo $product->price;?>"/>
    <br />
    <?php
	if ($product->quantity == 0){
?>
    <h4> <span style="color:red;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sold Out</span></h4> 
       <input type="hidden" id='qleft' value="<?php echo $qty;?>">
    <?php
    }else{ 
    ?>

    
    <h4 style="color: green;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantity: 
    <?php
	echo "<select class='span1' name='quantity' id='qty' style='color:green;'>";
$i=1; $quant=$product->quantity;
while ($i <= $quant ){
    echo "<option value=".$i.">".$i."</option>";
    $i++;
}
echo "</select>";
?></h4>
    <br />
    <h4 style="color: green;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->quantity;?> Items stock</h4> 
       <input type="hidden" id='qleft' value="<?php echo $product->quantity;?>" style="color: green;">
       
       <button type="submit" name="submit" class="btn btn-md btn-success  btn-fill">
        <i class=" icon-shopping-cart"></i> Add to cart
      </button>
    <?php }
     }
     else{
       ?>
       <span style="color:red;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRODUCTS ALREADY ADDED TO CART</span>
<?php
     }
   ?>
    
          
          </div>
        </form>
        
     
       
        
        
        
        <hr class="soft clr"/>
        <p style="color: green;">
        <?php echo $product->descr;?>
        </p>


<?php
$select=mysql_query("select * from products order by product_id desc");
while($product=mysql_fetch_array($select)){
  $name=$product['title'];
  $id=$product['product_id'];
}

?>
<td><?php echo $product['product_id']
;?>. <a  href="download.php?filename=<?php echo $product['title'];?>"><?php echo $product['title'] ;?>download</a></td>
<td align="center"><a href="delete.php?id=<?php echo $product['product_id']; ?>">Delete</a></td>


?>
  </div>

</font>


<!-- Footer ------------------------------------------------------ -->
<hr class="soft">
<div  id="footerSection" class="thumbnail">
	<?php include('footer.php');?>
    </div>
</body></div>