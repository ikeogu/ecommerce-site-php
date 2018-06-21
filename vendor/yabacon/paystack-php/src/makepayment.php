<?php
	require 'autoload.php';
	define(SECRET_KEY, sk_test_7c3bb988d494129ed6837affe00b57da5699edb2);
 $paystack = new Yabacon\Paystack(SECRET_KEY);
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
    save_last_transaction_reference($tranx->data->reference);

    // redirect to page so User can pay
    header('Location: ' . $tranx->data->authorization_url);
?>
