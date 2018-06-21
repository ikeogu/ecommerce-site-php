<?php
	require ('src/autoload.php');
    define ('SECRET_KEY','sk_test_35f7e3e96eb26287e2aee993e9c6b7910f2c7e44');

	$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
    if(!$reference){
      die('No reference supplied');
    }

    // initiate the Library's Paystack Object
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
    	var_dump($tranx);
    	$user = User::find($session->userid);
    	$transaction = new Transaction();
    	$transaction->userid = $user->userid;
    	$transaction->unix_time = time();

    	$hash = md5(time());

    	$transaction->create();

    	//url = heldyproducts/bookdownload.php?id=$hash

    	//$transaction = where(array('hash'=>$hash,'userid'=>$user->userid));
    	//$current_time = time();
    	//($transaction->unix_time + 24 * 60 * 60 < $current_time) ? valid : invalid;
      // transaction was successful...
      // please check other things like whether you already gave value for this ref
      // if the email matches the customer who owns the product etc
      // Give value
    }
?>