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
                            <span>Please  <span>Login up</span> </span> <button class="btn btn-default"> Get Stared </button></h3>
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
                            <div class="logo"><i class="fa fa-diamond"></i>ADMIN  LOgin</div>
                        </div>
                        
                    </div>
                </div>
            </div>
            

  <div class="content" style="padding-top: 100; margin-left: 50;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Login</h4>
                            </div>
                            <div class="content">
                                <form action="login.php" method="POST" id="loginForm" name="loginForm">
                                    <div>
                                        <?php echo $result;?>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control"   name="email"  required="">
                                            </div> 
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Password"  name="password" id="confirmpassword">
                                            </div>
                                        </div>
                                        <div class="col col-lg-8">
                                        <button  type="submit" class="btn btn-blue btn-fill pull-right"  name="login">Login </button>
                                        <a href="adminsignup.php" class="btn btn-blue btn-fill pull-left"  >Sign up</a>
                                    </div>
                                    </div>
                                </form> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <?php include_once '../footer.php';?>
</body>
</html>





                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
