<?php
	include_once 'model.php';
	/**
	* 
	*/
	class Transaction  extends Model
	{

		public $transac_id;
		public  $customer_id;
		public  $product_id;
		public  $datetime;
		public  $amount;
		public  $hash;
		public  $unixtime;
		public  $reference;
		public  $ip_address;
		
		public  $created_at;
		public  $status;
		public  $message;
		public  $error = array();

		protected static $class_name = 'Transaction';
		protected static $primary_key = 'transac_id';
		protected static $table_name = 'transaction';
		protected static $table_fields = array('transac_id','customer_id','product_id','datetime','amount','hash','unixtime','reference','status','ip_address','created_at','message' );
				
		function __construct()
		{
			# code...
			parent::__construct();
		}

		public  function getTransactionId(){
    	return $this->transac_id;
   		}
 		public function setNewTransactionId(){
			if($lasttransaction = static::last()){
	      		$lastId = explode ('/',$lasttransaction->transac_id);
	      		$lastId[1]++;
	    		$this->transac_id = 'TRANS/'.$lastId[1];
    		}else{
     				return $this->transac_id = 'TRANS/001'; 
    		}
		}

		public function storeTransaction(){
	 		$this->setNewTransactionId();
	 		return ($this->create())? true : false;
	 	}
}

?>