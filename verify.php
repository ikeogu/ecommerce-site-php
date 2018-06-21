<?php
include_once 'includes/customer.php';
include_once 'includes/session.php';
include_once 'includes/transaction.php';
require 'vendor/yabacon/paystack-php/src/autoload.php';
include ('includes/orderdetails.php');
include_once 'includes/function.php';
 $ordered_items = Orderdetails::where(array('customer_id' =>$session->user_id));
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
    if(!$reference){
      die('No reference supplied');
    }

    // initiate the Library's Paystack Object
    define('SECRET_KEY', 'sk_test_7c3bb988d494129ed6837affe00b57da5699edb2');
    $paystack = new Yabacon\Paystack(SECRET_KEY);
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
        
        foreach ($ordered_items as $key => $item) {
          $product_id = $item->product_id;
          $file = $item->file;
        }
      
       
        $transaction = new Transaction();
         $transaction->product_id = $product_id;
        $transaction->hash = md5(time());
        $transaction->unixtime = time();
        $transaction->product_id = $product_id;
        $transaction->amount = $tranx->data->amount;
        $transaction->reference = $tranx->data->reference;
        $transaction->status = $tranx->data->status;
        $transaction->ip_address = $tranx->data->ip_address;
        $transaction->created_at = $tranx->data->created_at;
        $transaction->datetime = $tranx->data->paid_at;
        $transaction->customer_id = $session->user_id;
        $transaction->message = $tranx->message;
      
        $transaction->storeTransaction();
      }

     redirect("download.php?code=$transaction->hash&id=$transaction->product_id");



    

?>