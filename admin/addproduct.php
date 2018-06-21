<?php
 include ("header2.php");
    include_once '../includes/product.php';
    $result = '';
  
    if(isset($_POST['create'])){
       
        
      $product = Product::instantiate($_POST);
      $product->price *=100;
      $header = ' Upload Status ';
      $message ='Your product  was successfully uploaded.';
      $message2= 'Oops! seems somthing was missing .';
      $message3= 'file upload was successful.';
      if($product){ 
        $product->attach_file($_FILES['logo']) and $product->attach_file($_FILES['file']);

            if ($product->save_with_file()) {
                 $result = '<div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <strong>Success!</strong>'." $header ".'<hr/>'." $message".'</div>';
            }else {
                    $result = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Oops! </strong>'." $header ".'<hr/>'." $message2 ".'</div>';
        }
    }  
}

?>
  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add a new product</h4>
                            </div>
                            <div class="content">
                                <form action="addproduct.php" method="POST" enctype="multipart/form-data">
                                    <div>
                                        <?php echo $result;?>
                                    </div>
                                     <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" class="form-control"   name="logo"  >
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-4 col-lg-6">
                                            <div class="form-group">
                                                 <label>Name</label>
                                                    <input type="text" class="form-control" placeholder="Name"  name="title">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-6">
                                            <div class="form-group">
                                               <label for="exampleInputEmail1">Author</label>
                                                      <input type="text" class="form-control" placeholder="Author" name="publisher">
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fileSelect">Load file</label>
                                                    <input type="file" class="form-control"   name="file"  required="" id="fileSelect">
                                                </div>
                                        </div>
                                    </div>        
                                    <div class="row">
                                
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label>Date out</label>
                                                    <input type="date" class="form-control"   name="dateout">
                                                </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" class="form-control" placeholder="cost in  Naira" name="price" >
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input type="text" class="form-control" placeholder="Number of goods" name="quantity" >
                                                </div>
                                            </div>
                                            <div>
                                                <?php
                                                    include_once "../includes/category.php";
                                                    $category = Categories::listCategory();
                                                    echo $category;
                                                ?>
                                            </div>
                                    </div>    
                                    <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea type="text" class="form-control" placeholder="Description" name="descr" ></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="form-group">
                                                <button type="submit" class="btn btn-info btn-fill pull-right" name="create" >Up Load</button>
                                            </div>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>   
       

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="user.php">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="../index.php">
                                Home Page
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>                 </p>
            </div>
        </footer>

    </div>
</div>


</body>
</html>
