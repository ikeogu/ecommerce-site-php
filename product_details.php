<?php include('includes/connect.php');
include('formatMoney.php');
include_once 'includes/product.php';
include_once 'includes/session.php';

 if(isset($_GET) & !empty($_GET)){
  $product_id = $_GET['product_id'];
  $product = Product::find($product_id);
}else{
  header('location: product.php');
}

?>



<?php include("user_header.php");?>


	
      <div id="gallery" class="span3">
        <img src="images/product/<?php echo $product->logo;?>" width="20%" alt="" class="img-border img-responsive"/>
        
      </div>
     
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->title;?></h3>
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->publisher;?></h3>
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->dateout;?></h3>
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->category;?></h3>
        <h3>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->size.'MB'?></h3>
        <hr class="soft"/>
        <form class="form-horizontal qtyFrm">
          <div class="control-group">
          <label class="control-label"><span>&nbsp;Price: N<?php echo formatMoney($product->price,2);?></span></label>
          <br /><br /><br /><br /> <a href="products.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="span2 btn-success large" value="Back"/></a>
          </div>
        </form>
        
        <hr class="soft"/>
        
        
<?php  echo $product->quantity?> 
        
        
  
       <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $product->quantity;?> items in stock</h4>

  
        <hr class="soft clr"/>
        <p>
        <?php echo $product->descr;?>
        </p>
        </div>
<!-- Footer ------------------------------------------------------ -->
<hr class="soft">
<div class="thumbnail" id="footerSection">
	<?php include('footer.php');?>
    </div></div></body></font>
