<?php

$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
    if(!$reference){
      die('No reference supplied');
    }

    // initiate the Library's Paystack Object
    $paystack = new Yabacon\Paystack(sk_test_7c3bb988d494129ed6837affe00b57da5699edb2);
    try
    {
      // verify using the library
      $tranx = $paystack->transaction->verify([
        'reference'=>$reference, // unique to transactions
      ]);
    } catch(\Yabacon\Paystack\Exception\ApiException $e){
      print_r($e->getResponseObject());
      die($e->getMessage());
    }

    if ('success' === $tranx->data->status) {
      // transaction was successful...
      // please check other things like whether you already gave value for this ref
      // if the email matches the customer who owns the product etc
      // Give value
    }


?>