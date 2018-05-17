<?php 
include('includes/connect.php');
include('includes/session.php');
include('includes/product.php');
include('formatMoney.php');
include ('includes/function.php');
include ('includes/orderdetails.php');
include ('user_header.php');
 //if(isset($_GET) & !empty($_GET))
  //$product = Product::find($product_id);
 if(isset($_POST) & !empty($_POST)){
   $order = Orderdetails::instantiate($_POST);
   $product = Product::find($order->product_id);
   $order->computeOrderDetails($product->price);
   $order->customer_id = $session->user_id;
   $order->save();
  
   }
if (isset($_GET['product_id']) && isset($_GET['opt'])){
    $product = Product::find($_GET['product_id']);
    if($_GET['opt']==0 && $product)
      $product->delete();
    redirect ('product_summary.php');
  }
   $ordered_items = Orderdetails::where(array('customer_id' =>$session->user_id));
?>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({

        env: 'sandbox', // sandbox | production

        client: {
            sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production: '<insert production client id>'
        },

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '0.01', currency: 'USD' }
                        }
                    ]
                }
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {

            // Get the payment details

            return actions.payment.get().then(function(data) {

                // Display the payment details and a confirmation button

                var shipping = data.payer.payer_info.shipping_address;

                document.querySelector('#recipient').innerText = shipping.recipient_name;
                document.querySelector('#line1').innerText     = shipping.line1;
                document.querySelector('#city').innerText      = shipping.city;
                document.querySelector('#state').innerText     = shipping.state;
                document.querySelector('#zip').innerText       = shipping.postal_code;
                document.querySelector('#country').innerText   = shipping.country_code;

                document.querySelector('#paypal-button-container').style.display = 'none';
                document.querySelector('#confirm').style.display = 'block';

                // Listen for click on confirm button

                document.querySelector('#confirmButton').addEventListener('click', function() {

                    // Disable the button and show a loading message

                    document.querySelector('#confirm').innerText = 'Loading...';
                    document.querySelector('#confirm').disabled = true;

                    // Execute the payment

                    return actions.payment.execute().then(function() {

                        // Show a thank-you note

                        document.querySelector('#thanksname').innerText = shipping.recipient_name;

                        document.querySelector('#confirm').style.display = 'none';
                        document.querySelector('#thanks').style.display = 'block';
                    });
                });
            });
        }

    }, '#paypal-button-container');

</script>
<script type='text/javascript'>

  function numbers(){

    //var CheckPassword = /^[A-Za-z]\w{7,14}$/; - numbers and characters and uppercase
    var letterexp = /^[a-zA-Z]+$/;
    var quanti = 32; 
    if(document.getElementById('quantity').value.match(letterexp)){
      alert('Please input numbers only');
      document.getElementById('quantity').value='';
    }
    
  }
</script>

<script>
  function confirmDelete(delUrl) {
    if (confirm("Are you sure you want to update product status?")) {
     document.location = 'update_stat.php';
    }
  }
</script>
<!-- ======================================================================================================================== -->	



<div id="mainBody" class="container">
    <font color="black">

    <form method="post" action="payment_details.php">
      <h3>  SHOPPING CART [ <small><?php
        $count = count(Orderdetails::where(array('customer_id' => $session->user_id )));
        echo $count;?> </small>]
     </h3>  
      <hr class="soft"/>
      
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Product</th>
            <th>Description</th>
            <th  width="100">Quantity</th>
            <th  width="80">Price</th>
            <th width="80">Total</th>
            <th width="100">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $row= '';
             $total = 0;
            foreach ($ordered_items as $key => $item) {
              # code...
             $total += $item->Total ;
            
            $product = Product::find($item->product_id);
            $strings =  $product->descr;
            $string = strip_tags($strings);

           if (strlen($string) > 20) {
              $stringCut = substr($string, 0, 10);
              $string = substr($stringCut, 0, strrpos($stringCut, ' '))."... <a href='user_product_details.php?id=$item->product_id'><span style='color:blue'>Read More</span></a>";
            } 
            $row.= " <tr>
                          <td><img width='60' src='images/product/$product->logo'> </td>
                          <td>$product->title  <br/>   $string</td>
                          <td>$item->quantity</td>
                          <td>$product->price</td>
                          <td>$item->Total</td>
                          <td><a href='product_summary.php?id={$item->product_id}&opt=0'>
                            <button class='btn btn-info' onclick='return confirm('Are you sure you want to delete?')' type= 'button'>
                            <i class='icon-remove icon-white'></i> Remove</button></a></td>

                      </tr>    
            "; 
            }
            echo $row."<td colspan='5' align='right'><h4> TOTAL = $total</h4></td>";                
          ?> 
        </tbody>
      </table>           
          <?php
            if($count==0 ){
            ?>
            <script type="text/javascript">
              alert("Your shopping cart is empty. Add an item");
              window.location= "user_products.php";
            </script>
           <?php
              }else{
          ?>   
        <div class="row">
          <div class=" col-lg-6 col-md-6">
            <a href="user_products.php"  type= "button" class="btn btn-large btn-fill btn-success"> Continue Shopping<i class="icon-arrow-left"></i>  </a>
          </div>
          <div id="paypal-button-container"></div>

          <div id="confirm" class="hidden">
              <div>Ship to:</div>
              <div><span id="recipient"></span>, <span id="line1"></span>, <span id="city"></span></div>
              <div><span id="state"></span>, <span id="zip"></span>, <span id="country"></span></div>

              <button id="confirmButton">Complete Payment</button>
          </div>

          <div id="thanks" class="hidden">
              Thanks, <span id="thanksname"></span>!
          </div>
<script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
          </div>  
        </div>   
        <?php
          }
        ?>
       
  </form>
</font>
</div>
<hr class="soft">
<div class="thumbnail" id="footerSection">
	<?php include('footer.php');?>
</div>