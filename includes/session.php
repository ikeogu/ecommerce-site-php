<?php
	
	/**
	* 
	*/
	class Session {

		public  $product_id, $cat_id, $cutomer_id, $email;          //id of the user lgged in 
		public $logged_in = false;	//true or false;
       
		public function __construct(){
			session_start();
			$this->check_login();
		}
		public function check_login(){
			if(isset($_SESSION['user_id'])) {
				# code...
				$this->user_id = $_SESSION['user_id'];
				$this->logged_in = true;
			}else {
				unset($this->user_id);
				$this->logged_in = false;
			}
		}

		public function is_logged_in(){
			return $this->logged_in;
		}

		public function login($user){
			if($user){
				//$this->user_id = $_SESSION['user_id'] = $user->getProductId();
				$this->user_id = $_SESSION['user_id'] = $user->getcustomerEmail();
				$this->logged_in = true;
			}
		}

		public function logout(){
			$this->logged_in = false;
			session_destroy();
		}
		//for the product to be kept in session so that i can fetch it from the server
		public function setProductId($id){
			 $_SESSION['product_id'] =$this->product_id  = $id;
		}

		public function getProductId(){
			if(isset($_SESSION['product_id']))
				 $_SESSION['product_id'] = $this->product_id;
		}
	}

	$session = new Session();
	ob_start();

?>