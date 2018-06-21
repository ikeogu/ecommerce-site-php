<?php
include_once 'model.php';
/**
* 
*/
class Orderdetails extends Model
{
	
	public $orderdetails_id;
	public $product_id;
	public $quantity;
	public $Total;
	public $customer_id;
	public $error =  array( );


	protected static $table_name = 'orderdetails';
	protected static $primary_key = 'orderdetails_id';
	protected  static $class_name = 'Orderdetails';
	protected  static $table_fields = array('orderdetails_id', 'product_id', 'customer_id','quantity','Total');


	function __construct()
	{
		# code...
		parent::__construct();
	}



	public function  getOrderdetails(){
		return $this-> $orderdetails_id;
	}

	private function verifyOrder (){
		$order = static::where(array('customer_id' => $this->customer_id, 'product_id' => $this->product_id));
		return ($order) ? array_shift($order) : false;
	}

	public function computeOrderDetails($price){
		$this->Total = $this->quantity * $price;
	}

	public function save(){
		if($order = $this->verifyOrder()){
			$this->orderdetails_id = $order->orderdetails_id;
			return $this->update();
		} else {
			return $this->create();
		}
	}







	
}


?>