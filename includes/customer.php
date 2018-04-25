<?php
 
 include_once 'Model.php';

 /**
 * 
 */
 class Customer extends Model
 	{
	 	public $customer_id;
	 	public $username;
	 	public $email;
	 	public $phone;
	 	public $password;
	 	public $error = array();

	 	protected static $class_name = 'Customer';
		protected static $primary_key = 'customer_id';
		protected static $table_name = 'customers';
		protected static $table_fields  = array('customer_id','username','phone','email','password');

		function __construct()
	 	{
	 		# code...
	 		parent::__construct();
	  	}
	  	public function getcustomerEmail(){
	  		return $this->email;
	  	}
	  	public function getCustomerId(){
	  		return $this->customer_id;
	  	}


		public  function setNewCustomerId(){
		
			if($lastcustomer  = static::last()){
	            $lastId = explode ('/',$lastcustomer->customer_id );
	            $lastId[1]++;
	            $this->customer_id  = 'CUSTR/00'.$lastId[1];
	        }else{
	            $this->customer_id  = 'CUSTR/001'; 
	        }
   		 }



		 public static function authenticate($password, $email){
            $password = md5($password);
            $sql = " SELECT * FROM ".static::$table_name." WHERE email  = '$email' AND password= '$password'  LIMIT 1";
            $customer = static::findBySql($sql);
            return ($customer) ? array_shift($customer) : false;
        }

	 	public function insertcustomer(){
	 		$this->setNewcustomerId();
	 		$this->password = md5($this->password);
	 		return ($this->create())? true : false;
	 	}



	 	/*public static function  findByHash($id,$hash) {
	 		$sql = "SELECT * FROM ".static::$table_name." WHERE customer_id = '$id' AND hash = '$hash' LIMIT 1";
	 		$customer = static::findBySql($sql);
	 		return ($customer) ? array_shift($customer) : false;
	 	}*/

	 	public static function FindByEmail($email, $password){
			$password = md5($password);
	 		$sql = "SELECT * FROM ".static::$table_name." WHERE email = '$email'  AND password = '$password'  AND  LIMIT 1";
	 		$customer = static::findBySql($sql);
	 		return ($customer) ? array_shift($customer) : false;
	 	}
	 	

	 	protected $upload_errors = array (
	 		UPLOAD_ERR_OK         => "No errors.",
	 		UPLOAD_ERR_INI_SIZE   => "Larger than upload_max_filesize.",
	 		UPLOAD_ERR_FORM_SIZE  => "Larger than form MAX_FILE_SIZE.",
	 		UPLOAD_ERR_PARTIAL    => "Partial upload",
	 		UPLOAD_ERR_NO_FILE    =>  "No file.",
	 		UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
	 		UPLOAD_ERR_CANT_WRITE => "Cant write to disk.",
	 		UPLOAD_ERR_EXTENSION  => "File upload stopped by extension." );

	 	

	 	public function  attach_file($file){
	 		//recieves $_file ('UPLOADED  FILE')
	 		//ERROR CHECKNG , SET OJESCT ATTRIBUTESss
	 		if(!$file || empty($file) || !is_array($file)){
	 			$this->errors[] = "No file ws uploaded. ";
	 			return  false;
	 		}elseif($file['error'] != 0){
	 			$this->errors[] = $this->upload->errors[$file['error']];
	 			return  false;
	 		}else{
	 			if (!isset($this->customer_id)) 
	 				$this->setNewcustomerId();
	 			$this->temp_path = $file['tmp_name'];
	 			$this->passport = str_replace("/", "_", $this->customer_id).".".basename($file["type"]);
	 			$this->type = $file['type'];
	 			$this->size = $file['size'];
	 			return true;
	 		}
	 	}

	 	public function save_with_file(){

	 		if(!empty($this->errors)){return false;}
	 		if(empty($this->passport) || empty($this->temp_path)){
	 			$this->errors[] = "The file location was not avaliable.";
	 			return false;
	 		}
	 		$target_path = "img/customer/".$this->passport;
	 		if(move_uploaded_file($this->temp_path, $target_path)){
	 			if(static::find($this->customer_id)){
	 				$this->update();
	 			}
	 			else{
	 				$this->password = md5($this->password);
	 				$this->create();
	 			}
	 			unset($this->temp_path);
	 			return true;
	 		}else {
	 			$this->errors[]= "The file uploade failed, possible due to incorrect permission on the upload folder";
	 			return false;
	 		}
	 	}



        public  static function allCustomersTable(){
    
          $table = '<table class= "table table-hover table-striped table-border">
                       <thead>
                        <td>Customer Id</td>
                        <td>USERNAME</td>
                        <td>Phone</td>
                        <td>Email</td>
                      </thead>
                      <tbody>';
             if($all = static::All())
                    
                    foreach ($all as $customer){
               
                         $table.="<tr>
                            <td>{$customer->getCustomerId()}</td>
                            <td>{$customer->username}</td>
                            <td>{$customer->phone}</td>
                            <td>{$customer->email }</td>
                    </tr>";
                          

                    }
                    $table.="</tbody></table>";
                          echo $table; 
                         
        }

	}



?>