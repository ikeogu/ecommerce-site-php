<?php 
  include('includes/session.php');
  include_once 'includes/product.php';
  include_once ('user_header.php');

  if(isset($_GET) & !empty($_GET)){
    $product_id = $_GET['id'];
    $product = Product::find($product_id);
    $_SESSION['product_id'] = $product->getProductId();
  }else{
    header('location: user_products.php');
  }
?>
    
<div class="container">  
  <div class="row">
    <div id="gallery" class="span3 col-lg-4 col-md-4 col-sm-4">
      <img src="images/product/<?php echo $product->logo; ?>" width="100%" />    
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <h3 style="color: green;"><?php echo $product->title; ?></h3>
      <h4> <?php echo $product->publisher;?></h4>
      <h4> <?php echo $product->category;?></h4>
      <div style="color: green;">
              <?php echo $product->descr;?>
      </div>
      <hr class="soft"/>
    </div>
    <div class="col-lg-4 col-sm-4 col-md-4">
      <form class="form-horizontal qtyFrm" method="post" action="product_summary.php">
          <input type="hidden" id="username" name="product_id" value="<?php echo($product->getProductid());?>" 
          class="input-xlarge" required style="color: green;"/>
          <div class="control-group">
            <label>
              <h3 style="color: green;"><span>Price: N<?php echo $product->price;?></span></h3>
            </label>
          </div>  
          <br/>
          <h4 style="color: green;"><?php echo $product->quantity;?> Items stock</h4> 
          <div class="control-group">
            <label><h4> Qty:</h4></label>
            <input name='quantity' type='number' min="1" max="<?php echo $product->quantity;?>" style="color:green;">
            <div>
               <button type="submit" name="submit" class="btn btn-md btn-success btn-fill">
                <i class="icon-shopping-cart"></i> Add to cart
              </button>
            </div>
          </div>    
        </form>
      </div>  
    </div>  
  </div>
</div>
<hr class='soft'>
  <div  id='footerSection' class='thumbnail'>
    <?php include_once('footer.php');?>
  </div>