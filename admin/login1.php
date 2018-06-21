<?php
    include_once 'includes/admin.php';
    include_once 'includes/session.php';
     include_once 'includes/function.php';
    $result ='';
    if(isset($_POST['login'])){
      $hash = $_POST['hash'];
      $admin_id = $_POST['admin_id'];

      $admin = Admin::authenticate($hash, $admin_id);

      $header = 'Registration Status';
      $message ='Admin  Loggin successsfully.';
      $message2= "Admin  Loggin Failed.";

      if($admin){
        $session->login($admin);

        redirect('user.php');
      } else {
          $result = '<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong>Danger!</strong>'."$header".'<hr/>'."$message2".'</div>';
      }
    }


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

    <title>ADMIN signup</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


<script type="text/javascript" src="js/JQUERY.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">
     function validatePassword() {
        var validator = $("#loginForm").validate({
            rules: {
                password: "required",
                confirmpassword: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: " Enter Password",
                confirmpassword: " Enter Confirm Password Same as Password"
            }
        });
        if (validator.form()) {
            alert('Sucess');
        }
    }
 
</script>

</head>

<body>
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
            
            <!-- header top -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul class="list-inline">
                                <li>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img  src="images/is.png" alt="" /> English <i class="fa fa-angle-down"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <ul class="list-inline">
                                <li><a href="#" ><i class="fa fa-mobile"></i> +88018374345</a></li>
                                <li><a href="#" ><i class="fa fa-envelope-o"></i> example@gmail.com</a></li>
                            </ul>   
                        </div>
                        <div class="col-sm-5">
                            <ul class="list-inline pull-right">
                                <li><a href="#" ><i class="fa fa-user"></i> My Account</a></li>
                               
                                <li><a class="register" href="signup.php" >Register</a></li>
                            </ul>   
                        </div>  
                    </div>  
                </div>
            </div>
            
            <!-- logo and adds -->
            <div class="logo-add">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo"><i class="fa fa-diamond"></i>Heldy- BuyProduct</div>
                        </div>
                        <div class="col-sm-8">
                            <h3 class="add bb-year-end-ribbon hidden-xs"><img src="img/re.jpg" width="40px;" alt="" /> 
                            <span>Please  <span>sign up</span> </span> <button class="btn btn-default"> Get Stared </button></h3>
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
                                                <label>User ID</label>
                                                <input type="text" class="form-control"   name="admin_id"  required="">
                                            </div> 
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Password"  name="hash" id="confirmpassword">
                                            </div>
                                        </div>
                                        <div class="col col-lg-8">
                                        <button  type="submit" class="btn btn-danger btn-fill pull-right"  name="login">Login </button>
                                        <a href="adminsignup.php" class="btn btn-danger btn-fill pull-left"  >Sign up</a>
                                    </div>
                                    </div>
                                </form> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
</body>
</html>





                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
