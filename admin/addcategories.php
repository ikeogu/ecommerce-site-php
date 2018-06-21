<?php
include ("header2.php");
include_once '../includes/category.php';
//include_once 'includes/session.php';
include_once 'includes/function.php';
//if(!($session->is_logged_in())) redirect('login.php');
     $result = '';
   
     if(isset($_POST['create'])){
       $categories = Categories::instantiate($_POST);
       $header = ' Upload Status ';
       $message ='Category was added Successfully.';
       $message2= 'Oops! seems somthing was missing .';
       if ($categories->insertCategories()) {
                  $result = '<div class="alert alert-success alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                   <strong>Success!</strong>'." $header ".'<hr/>'." $message".'</div>';
             }else {
                     $result = '<div class="alert alert-danger alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <strong>Oops! </strong>'." $header ".'<hr/>'." $message2 ".'</div>';
         }
       }
    
?>


<div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-8">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">Add a Category</h4>
                          </div>
                          <div class="content">
                              <form action="addcategories.php" method="POST">
                                  <div>
                                      <?php echo $result;?>
                                  </div>
                                  
                                     <div class="col-md-3">
                                          <div class="form-group">
                                              <label>Name</label>
                                              <input type="text" class="form-control" placeholder="Name"  name="name">
                                          </div>
                                      </div>
                                      
                                  </div>


                                <button type="submit" class="btn btn-info btn-fill pull-right" name="create" >Add to Category</button>
                                  <div class="clearfix"></div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div> 
          </div>
      </div>   
<?php
include("footer2.php");
?>