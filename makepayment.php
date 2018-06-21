<?php
  require 'paymentgateway/vendor/yabacon/paystack-php/src/autoload.php';
  include_once 'includes/customer.php';
  include_once 'includes/session.php';
  include ('includes/orderdetails.php');
 $ordered_items = Orderdetails::where(array('customer_id' =>$session->user_id));
  if(is_array($ordered_items)){
    $amount = 0;
    foreach ($ordered_items as $key => $item) {
      $amount += $item->Total;
    }
    $email = $session->user_id;
    
    

    $reference = substr(md5(time()), 0, 7);
    $paystack = new Yabacon\Paystack('sk_test_7c3bb988d494129ed6837affe00b57da5699edb2');
      try
      {
        $tranx = $paystack->transaction->initialize([
          'amount'=>$amount,       // in kobo
          'email'=>$email,         // unique to customers
          //'reference'=>$reference, // unique to transactions
        ]);

      } catch(\Yabacon\Paystack\Exception\ApiException $e){
        print_r($e->getResponseObject());
        die($e->getMessage());
      }

      // store transaction reference so we can query in case user never comes back
      // perhaps due to network issue
      //save_last_transaction_reference($tranx->data->reference);

      // redirect to page so User can pay
      header('Location: ' . $tranx->data->authorization_url);
    }  


?>
