<?php
	include_once 'Model.php';

	/**
	* 
	*/
	class order extends Model
	{
		public $order_id;
		public $customer_id;
		public $date_out;
		public $total;
		public $status;
		public $download_status; 

		protected static $table_name = 'oder';
		protected static $primary_key = 'order_id';
		protected  static $class_name = 'order';
		protected  static $table_fields = array('order_id','customer_id','date_out','total','download_status','status');
		function __construct()
		{
			# code...
			parent::__construct();
		}

		
	}

?>