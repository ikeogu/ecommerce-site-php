<?php
    include_once 'includes/admin.php';
    include_once 'includes/session.php';
     include_once 'includes/function.php';
    $result ='';
    if(isset($_POST['login'])){
      $password = $_POST['password'];
      $email = $_POST['email'];

      $admin = Admin::authenticate($password, $email);

      $header = 'Registration Status';
      $message ='Admin  Loggin successsfully.';
      $message2= "Admin  Loggin Failed.";

      if($admin){
        $session->login($admin);

        redirect('user.php');
      } else {
          $result = '<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

        <strong> Oops!</strong>'."$header".'<hr/>'."$message2".'</div>';
      }
    }


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Signup</title>
        <!-- ALL STYLESHEET -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style2.css" rel="stylesheet">
        <!--link href="css/blog-single.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet"-->
    </head>   
    <body>
        
        <!-- header -->
        <header class="header">
            
            <!-- logo and adds -->
            <div class="logo-add">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo"><i class="fa fa-diamond"></i>Heldy- BuyProduct</div>
                        </div>
                        <div class="col-sm-8">
                            <h3 class="add bb-year-end-ribbon hidden-xs"><img src="img/re.jpg" width="40px;" alt="" /> 
                            <span>Please  <span>Login</span> </span> </h3>
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
                            </div>  
                            <div class="logo-add">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="logo"><i class="fa fa-diamond"></i>ADMin  LOGin</div>
                                        </div>
                                                
                                    </div>
                                </div>
                            </div>
                        </nav>  
                    </div>
                </div>
            </div>              
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="header">
                                    <div class="row">
                                        <div class="col-lg-5">
                                         <?php echo $result;?>
                                        </div> 
                                    </div>
                                </div>
                                <div class="content">
                                    <form action="login.php" method="POST" id="loginForm" name="loginForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                        <input type="email" class="form-control"   name="email"  required="">
                                                </div>
                                            </div> 
                                            </div> 
                                            <div class="row">   
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                            <input type="password" class="form-control" placeholder="Password"  name="password" id="confirmpassword">
                                                </div>
                                            </div> 
                                            </div>   
                                            <div class="row">
                                                <div class="col col-lg-3">
                                                    <button  type="submit" class="btn btn-info btn-fill pull-right btn-md"  name="login">Login </button>
                                                </div>
                                                <div class="col col-lg-3">
                                                    <a href="adminsignup.php" type = "button" class="btn btn-info btn-fill pull-left btn-md"  >Sign up</a>
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
            <div>
              <?php include_once '../footer.php';?>  
            </div>
        
</body>
</html>





                                
                                                    
