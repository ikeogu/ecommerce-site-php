<!doctype php>
<php lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title> Dashboard </title>

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

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                        ADMIN DASHBOARD
                </a>
            </div>

            <ul class="nav">
               
                <li>
                    <a href="user.php">
                        <i class="pe-7s-user active"></i>
                        <p>User Profile</p>
                    </a>
                </li>
               
                <li>
                    <a href="addcategories.php">
                        <i class="pe-7s-smile"></i>
                        <p>Add Category</p>
                    </a>
                </li>
                <li>
                    <a href="addproduct.php">
                        <i class="pe-7s-magic-wand"></i>
                        <p>Add Products</p>
                    </a>
                </li>
                <li>
                    <a href="categories.php">
                        <i class="pe-7s-hourglass"></i>
                        <p>Review Category</p>
                    </a>
                </li>
                <li>
                    <a href="product3.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Review Products</p>
                    </a>
                </li>
                <li>
                    <a href="customers.php">
                        <i class="pe-7s-note2"></i>
                        <p>Reviews Customers</p>
                    </a>
                </li>
                <li>
                    <a href="order.php">
                        <i class="pe-7s-graph"></i>
                        <p>tRANSACTIONS</p>
                    </a>
                </li>
                <li>
                    <a href="https://dashboard.paystack.com/#/login">
                        <i class="pe-7s-arc"></i>
                        <p>VISIT PAYSTACK</p>
                    </a>
                </li>
                 <li>
                    <a href="../index.php">
                        <i class="pe-7s-home"></i>
                        <p>HOME PAGE</p>
                    </a>
                </li>
				<li>
                    <a href="logout.php">
                        <i class="pe-7s-bandaid"></i>
                        <p>Log out</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-inverse navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
