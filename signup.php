<?php
include ("header.php");
    include_once 'includes/customer.php';
    $result = '';
  
      if(isset($_POST['create'])){
              $customer = Customer::instantiate($_POST);
              $header = 'Registration Status';
              $message ='Customer created successsfully.';
              $message2= 'Customer was not created.';
              if($customer)
            if ($customer->insertcustomer()) {
                 echo  $result = '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  '."$header".'<hr/>'."$message".'</div>';
             }else {
                  echo $result = '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  '."$header".'<hr/>'."$message2".'</div>';
                }
            }   
?>
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
            alert('Success');
        }
    }
 
</script>


  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Signup</h4>
                            </div>
                            <div class="content">
                                <form action="signup.php" method="POST" enctype="multipart/form-data" id="loginForm">
                                    <div>
                                        <?php echo $result;?>
                                    </div>
                                    <div class="row">
                                       
                                       <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username"  name="username">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email" name="email">
                                            </div>
                                        </div>
                                    </div>

                                    

                                  
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" id="password">
                                                <label>password</label>
                                                <input type="password" class="form-control" placeholder="password" name="password" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" id="confirmpassword">
                                                <label>confirm password</label>
                                                <input type="password" class="form-control" placeholder="confirm password" name="" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" placeholder="phone" name="phone" >
                                            </div>
                                        
                                    </div>
                                <div>
                                   
                                    <button type="submit" class="btn btn-info btn-fill pull-right col" name="create" >Sign up</button>
                                </div>
                                    <div class="clearfix">
                                        <a type="button" class="btn btn-info btn-fill pull-right col" href="login.php" >Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>  

<?php

include ("footer.php");
?>            