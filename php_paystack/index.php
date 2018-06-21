<?php
    require ('src/autoload.php');
    define ('SECRET_KEY','sk_test_35f7e3e96eb26287e2aee993e9c6b7910f2c7e44');
    $paystack = new Yabacon\Paystack(SECRET_KEY);
    $amount = 5000;
    $email = 'lewisugege@gmail.com';
    $reference = substr(md5(time()),0,7);
    try
    {
      $tranx = $paystack->transaction->initialize([
        'amount'=>$amount,       // in kobo
        'email'=>$email,         // unique to customers
        'reference'=>$reference, // unique to transactions
      ]);
    } catch(\Yabacon\Paystack\Exception\ApiException $e){
      print_r($e->getResponseObject());
      die($e->getMessage());
    }

    // store transaction reference so we can query in case user never comes back
    // perhaps due to network issue
    // save_last_transaction_reference($tranx->data->reference);

    // redirect to page so User can pay
    header('Location: ' . $tranx->data->authorization_url);
?>
<!doctype html>
<html>
    <head>
    
    </head>
    <body>
    
    </body>
</html>