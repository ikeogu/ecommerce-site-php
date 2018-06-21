<?php
include_once 'Model.php';
/**
* 
*/
class DownloadKey extends Model
{

    public $uniqueid;
    public $timestamp;
    public $downloads;
    public $error = array();




    protected static $class_name = 'DownloadKey';
    protected static $primary_key = 'uniqueid';
    protected static $table_name = 'downloadkey';
    protected static $table_fields  = array('uniqueid','timestamp','downloads');



    
    function __construct()
    {
        parent::__construct();
    }

    
}

?>