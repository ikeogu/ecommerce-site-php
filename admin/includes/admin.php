<?php
 include_once 'model.php';

    class Admin extends Model{
    	public $admin_id;
    	public $fname;
    	public $lname;
        public $username;
        public $passport;
    	public $dob;
    	public $email;
    	public $address;
        public $password;
        public $city;
        public $country;
        public $phone;
        public $aboutme;
    	public $error = array();

        protected static $class_name = 'Admin';
        protected static $primary_key = 'admin_id';
        protected static $table_name = 'admin';
        protected static $table_fields = array('admin_id' ,'fname','lname','dob','email','address','username','passport','password','city','country','phone','aboutme');
    

          function __construct()
        {
            # code...
            parent::__construct();
        }

        public function getAdminId(){
            return $this->admin_id;
        }


        public function getAdminEmail(){
            return $this->email;
        }
        public function setNewAdminId(){

        //U2017/001
        if($lastadmin  = static::last()){
            $lastId = explode ('/',$lastadmin->admin_id );
            $lastId[1]++;
            $this->admin_id  = 'ADMIN/00'.$lastId[1];
        }else{
            $this->admin_id  = 'ADMIN/001'; 
        }

    }

        public function insertAdmin(){
            $this->setNewAdminId();
        

            $this->hash = md5($this->hash);
            return ($this->create())? true : false;
        }

        public static function authenticate($password, $email){
            
            $sql = " SELECT * FROM ".static::$table_name." WHERE email = '$email' AND password = '$password'  LIMIT 1";
            $admin = static::findBySql($sql);
            return ($admin) ? array_shift($admin) : false;
        }

        public static function  findByGender() {
            $sql = " SELECT * FROM ".static::$table_name."WHERE sex = ' $sex'  ORDER BY sex ASC ";
            $admin = static::findBySql($sql);
            return ($admin) ? array_shift($admin) : false;
        }
         
        public static function findByEmail($email, $password){
            $password = md5($password);
            $sql = "SELECT * FROM ".static::$table_name." WHERE email = '$email' AND password = '$password'  AND status = '1'  LIMIT 1";
            $admin = static::findBySql($sql);
            return ($admin) ? array_shift($admin) : false;
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
                $this->errors[] = "No file was uploaded. ";
                return  false;
            }elseif($file['error'] != 0){
                $this->errors[] = $this->upload->errors[$file['error']];
                return  false;
            }else{
                if (!isset($this->admin_id)) 
                    $this->setNewAdminId();

                $this->temp_path = $file['tmp_name'];
                $this->passport = str_replace("/", "_", $this->admin_id).".".basename($file["type"]);
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
            $target_path = "assets/img/admin/".$this->passport;
            if(move_uploaded_file($this->temp_path, $target_path)){
                if(static::find($this->admin_id)) {
                    $this->update();
                }
                else{

                
                    $this->create();
                }
                unset($this->temp_path);
                return true;
            }else {
                $this->errors[]= "The file uploade failed, possible due to incorrect permission on the upload folder";
                return false;
            }
        }

         function ageCalulator($dob){
           if(!empty($dob)){
             $birthday = new DateTime($dob);
             $today = new DateTime('today');
             $age = $birthday->diff($today)->y;
             return $age;
           }else {
             return 0;
           }
        }
           

    }
?>