<?php
	require 'vendor/yabacon/paystack-php/src/autoload.php';
$paystack = new Yabacon\Paystack('sk_test_df4616c60611b2ab7f451d212ef6dfb1e9a7ba0e');
try
{
  $tranx = $paystack->transaction->initialize([
    'amount'=>'2345',       // in kobo
    'email'=>'ikeogu@gmail.com',         // unique to customers
    //'reference'=>$reference, // unique to transactions
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