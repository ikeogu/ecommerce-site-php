<?php
 include_once 'Model.php';

 /**
 * 
 */
 class Categories extends Model
 {
 	protected $cat_id;
  public $name;
 	protected static $class_name = 'Categories';
	protected static $primary_key = 'cat_id';
	protected static $table_name = 'categories';
	protected static $table_fields = array('cat_id','name' );





 	function __construct()
 	{
 		# code...
 		parent::__construct();
 	}

 	 public  function getcategoriesId(){
    return $this->cat_id;
   }
 	public function setNewCategoryId(){

		
    
		//cat/001
		if($lastcategory = static::last()){
      $lastId = explode ('/',$lastcategory->cat_id);
      $lastId[1]++;
    $this->cat_id = 'CAT/0'.$lastId[1];
    }else{
     return $this->cat_id = 'CAT/01'; 
    }
  }
    
 	public function insertCategories(){
 		$this->setNewCategoryId();
 		return ($this->create())? true : false;
 	}



  protected $upload_errors = array (
      UPLOAD_ERR_OK         => "No errors.",
      UPLOAD_ERR_INI_SIZE   => "Larger than upload_max_filesize.",
      UPLOAD_ERR_FORM_SIZE  => "Larger than form MAX_FILE_SIZE.",
      UPLOAD_ERR_PARTIAL    => "Partial upload",
      UPLOAD_ERR_NO_FILE    =>  "No file.",
      UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
      UPLOAD_ERR_CANT_WRITE => "Cant write to disk.",
      UPLOAD_ERR_EXTENSION  => "File upload stopped by extension." 
  );


    

    public  static function category(){

     


    $display =" <section class='featured-product'>
                 <div class='container'>
                <div class='row'>
                  <div class='col-sm-12'>
                    <div class='>
                      <h1><span class='t-color-1'>Featured</span> Products
                        <small class='btn-group hidden-xs'>
                          <a class=' btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' 
                             aria-expanded='false'>All Categories <i class='fa fa-bars'></i></a>
                             <ul class='dropdown-menu'>
                        <li><a >All Categories</a></li>";
                if($all =static::All())
                 foreach ($all as $Category){  
                    $display .=" 
                        <li><a href='#' > $Category->name</a></li>";
                }
                        
                      
                 $display.=" 

                 </ul>
                    </small>
                  </h1>
                        <div class='heading-border b-color-1'></div>
                </div>
              </div>
            </div> 
          </div>";
          echo $display;
     }


     public static function listCategory(){

      $cat ="<div class='form-group'>
                <label>Category</label>
                <div class='col col-lg-7 input-group'>
                <span class='input-group-addon'><i class='fa fa-level-up' aria-hidden='true'></i></span>
                  <select name='category' class='control-label col col-lg-7 input-group' >
                    <OPTION > select category</OPTION>";
                      if($all =static::All())
                 foreach ($all as $Category){  
                    $cat .="
                            <option > $Category->name</option>";
                            }
                            $cat.=" </select>
                                        </div>
                                        </div>
                                        ";
                          echo $cat;              
     }
   }
?>