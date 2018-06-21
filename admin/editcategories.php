<?php
include("header2.php");
include_once '../includes/category.php';
//include_once 'includes/session.php';
include_once 'includes/function.php';
 //$categories = Categories::find($session->user_id);
 $result = '';
  
if(isset($_GET) & !empty($_GET)){
  $cat_id = $_GET['cat_id'];
  $categories = Categories::find($cat_id);

}

      
            if(isset($_POST['update'])){
              
            $categories = Categories::instantiate($_POST);
           $header = 'update Status';
            $message ='categories updated successsfully.';
            $message2= 'categories was not updated.';
            $message3 = 'there is no selected category, select category.';

          if($categories){
          if ($categories->update()) {

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

<div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-8">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">Edit Category</h4>
                          </div>
                          <div class="row">
                            <div class="col col-lg-4">
                                     <?php echo $result?>
                            </div>
                                  
                          </div>
                          <div class="content">
                              <form action="editcategories.php?id=<?php echo $categories->getcategoriesId()?>" method="POST">
                                  
                                     <div class="col-md-3">
                                          <div class="form-group">
                                              <label>Name</label>
                                              <input type="text" class="form-control" placeholder="Name"  value="<?php echo $categories->name; ?>" name="name">
                                          </div>
                                      </div>
                                      
                                  </div>


                                <button type="submit" class="btn btn-info btn-fill pull-right" name="update" > Update</button>
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