<?php
include_once 'includes/category.php';
include_once 'includes/admin.php';
include_once 'includes/session.php';
include_once 'includes/function.php';
if(!($session->is_logged_in())) redirect('adminlogin.php');
     $result = '';
    $admin = Admin::find($session->user_id);
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

<!doctype php>
<php lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>ADMIN PROFILE</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' value='viewport' />
    <meta value="viewport" content="width=device-width" />


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

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


      <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    PROFILE 
                </a>
            </div>

            <ul class="nav">
                
                <li class="active">
                    <a href="user.php">
                       <i class="pe-7s-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li>
                    
                        <i class="pe-7s-note2"></i>
                        <p>Add to Table</p>
                            </hr>
                        <ul>
                            <li>
                             <a href="addcategories.php">
                              <i class="pe-7s-rocket"></i> 
                              <p> Add A New category</p>
                            </a>
                            </li>
                            <li>
                              <a href="addproduct.php">
                                <i class="pe-7s-rocket"></i>
                                <p> Add A New Product</p>
                              </a>
                            </li>
                        </ul>
                
                </li>
                <li>
                    
                        <i class="pe-7s-news-paper"></i>
                        <p>Edit to Tabel</p>
                    </hr>
                    <ul>
                      <li>
                         <a href="Editcategories.php">
                          <i class="pe-7s-book"></i> 
                          <p> Edit category</p>
                        </a>
                      </li>
                      <li>
                         <a href="editproduct.php">
                          <i class="pe-7s-note2"></i> 
                          <p> Edit product</p>
                        </a>
                      </li>
                    </ul>
                    
                </li>
                <li>
                    <a href="icons.php">
                        <i class="pe-7s-science"></i>
                        <p>Delect From Table</p>
                    </a>
                </li>
                <li>
                    <a href="maps.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                
        
            </ul>
      </div>
    </div>

    <div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" value="<?php echo $admin->username;?>"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <h3>Welcome <?php echo $admin->username;?></h3>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
                  <p class="hidden-lg hidden-md">
                    5 Notifications
                    <b class="caret"></b>
                  </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                       
                        </li>
                        <li>
                            <a href="includes/logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
            <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

<section>
<div class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-8">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">Add a new product</h4>
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
</section>
<section>
  <?php
include("footer.php");
?>
</section>         
