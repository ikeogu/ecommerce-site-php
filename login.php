<?php
    include_once 'includes/session.php';
    include_once 'includes/function.php' ;
    include_once 'includes/customer.php';

    $result ='';
    
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $customer = Customer::authenticate($password, $email);      
        $header = 'status';
        $message2= "Oops, you can't Login check your incorrect password or email.";

        if($customer){
        
            $session->login($customer);

            redirect('user_products.php');
        
        } else {
            
            $result = '<div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert"> <span aria-hidden="true"> &times; </span><span class="sr-only">Close </span> </button>
                      <strong> Oop! </strong>'."$header".'<hr/>'."$message2".'</div>';
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

    <title>Login</title>

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
</head>

<body>

    <header class="header">
            
            <!-- header top -->
            <div class="header-top">
                <div class="container">
                    <!--<div class="row">
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
            </div>-->
            
            <!-- logo and adds -->
            <div class="logo-add">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo"><i class="fa fa-diamond"></i>Heldy- BuyProduct</div>
                        </div>
                        <div class="col-sm-8">
                            <h3 class="add bb-year-end-ribbon hidden-xs"><img src="img/re.jpg" width="40px;" alt="" /> 
                            <span>Please  <span>Login</span> </span> 
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
                        </nav>
                    </div>         
            </div>  
                <div class="logo-add">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo"><i class="fa fa-diamond"></i> LOGin</div>
                        </div>
                        
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
                                        <div class="col-lg-4 col-md-4 ">
                                           <?php echo $result?> 
                                        </div>
                                </div>
                            </div>
                            <div class="content">
                                <form action="login.php" method="POST" id="loginForm" name="loginForm">
                                    
                                    <div class="row">
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control"   name="email"  required="" placeholder="your Email@example.com">
                                            </div> 
                                        </div>    
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Password"  name="password">
                                            </div>
                                        </div>
                                        <div class="col col-lg-8">
                                            <button  type="submit" class="btn btn-info btn-fill pull-right"  name="login" style="color: green">Login </button>
                                            <a href="signup.php" class="btn btn-info btn-fill pull-left" style="color: green" >Signup</a>
                                         </div>
                                    </div>
                                
                                </form> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <?php include_once'footer.php';?>
        </footer>
        
</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     