<?php
include_once 'Model.php';
/**
* 
*/
class Checkout extends Model
{

    public $usermeta_id;
    public $country;
    public $fname;
    public $lname;
    public $zip;
    public $phone;
    public $address;
    public $state;
    public $payment;
    public $error = array();




    protected static $class_name = 'Checkout';
    protected static $primary_key = 'usermeta_id';
    protected static $table_name = 'usermeta';
    protected static $table_fields  = array('usermeta_id','fname','lname','phone','address','zip','state','country','payment');



    
    function __construct()
    {
        parent::__construct();
    }

    public function checkout(){
            $this->usermeta_id;
            return ($this->create())? true : false;
        }



}

?>