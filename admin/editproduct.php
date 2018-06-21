<?php
    include_once '../includes/product.php';
    include_once '../includes/session.php';
    include_once '../includes/function.php';
    $result = '';
  
   if(isset($_GET) & !empty($_GET)){
  $product_id = $_GET['product_id'];
  $product = Product::find($product_id);
}else{
  header('location: product.php');

      
            if(isset($_POST['update'])){
            $product = Product::instantiate($_POST);
            $product->product_id = $product_id;
            $header = 'update Status';
            $message ='product updated successsfully.';
            $message2= 'product was not updated.';

          if($product)
          if ($product->update()) {
               echo  $result = '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
'."$header".'<br/>'.'<hr/>'."$message".'</div>';
           }else {
                echo $result = '<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
'."$header".'<br/>'.'<hr/>'."$message2".'</div>';
              }
          }   

    }
?>
<?php
include("header2.php");
?>
<section> 
  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit product</h4>
                            </div>
                            <div class="content">
                                <form action="editproduct.php?id=<?php echo $product->getProductId()?>"  method="POST" enctype="multipart/form-data">
                                    <div>
                                        <?php echo $result;?>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-5">
                                            <div >
                                                <label>Logo</label>
                                                <img    name="logo"  required="" src="../images/product/<?php echo $product->logo?>" class="img-responsive" width="250px" alt="">
                                            </div>
                                        </div>     
                                       <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Name"  name="name" value="<?php echo $product->title?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Publisher</label>
                                                <input type="text" class="form-control" name="author" value="<?php echo $product->publisher?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date out</label>
                                                <input  class="form-control" value="<?php echo $product->dateout;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Size</label>
                                                <input type="text" class="form-control"  name="size" value="<?php echo $product->size?>">
                                            </div>
                                        </div>
                                       
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" class="form-control"  name="price" value="$<?php echo $product->price?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>quantity</label>
                                                <input type="text" class="form-control"  name="quantity" value="$<?php echo $product->quantity?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>catergory</label>
                                                <input type="text" class="form-control"  name="product_id" value="<?php echo $product->category;?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" class="form-control"  name="description" value="<?php echo $product->descr;?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-info btn-fill pull-right" name="update" >Update</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>   
</div>




   
 </section>    
<footer>
     <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
 <?php
include ("footer2.php");
?>   
</footer>
</body>
</html>
