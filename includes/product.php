<?php
 include_once 'Model.php';

 /**
 * 
 */
 class Product extends Model
 {
 	protected $product_id;
 	public $category;
 	public  $dateout;
 	public $title;
 	public $publisher;
 	public $price;
  public $logo;
  public $descr;
  public $size;
  public $quantity;
  public $file;
  
 	protected static $class_name = 'Product';
	protected static $primary_key = 'product_id';
	protected static $table_name = 'products';
	protected static $table_fields = array('publisher','title','logo','price','descr','product_id','category','dateout','size','quantity','file' );

 	function __construct()
 	{
 		# code...
 		parent::__construct();
 	}

   public function getProductId(){
    return $this->product_id;
   }
 	 
 	public function setNewProductId(){

		
		//prod/001
		if($lastproduct = static::last()){
      $lastId = explode ('/',$lastproduct->product_id);
      $lastId[1]++;
    $this->product_id = 'PROD/'.$lastId[1];
    }else{
      $this->product_id = 'PROD/01'; 
    }


	}


 	public function insertProduct(){
 		$this->setNewProductId();
 		return ($this->create())? true : false;
 	}

  /*public function displayproduct(){
        $sql = "SELECT * FROM ".static::$table_name." WHERE $product_id = 'product_id' ";
      $product = static::findBySql($sql);
      return ($product) ? array_shift($product) : false;
  }*/

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
        $this->errors[] = $this->upload_errors[$file['error']];
        return  false;
      }else{
        if (!isset($this->product_id) AND !isset($this->file)) 
          $this->setNewProductId();
        //$ext = pathinfo($file['name'],PATHINFO_EXTENSION);
        $this->temp_path = $file['tmp_name'];
        $this->logo = str_replace("/", "_", $this->product_id).".".basename($file['type']);
        $this->file = str_replace("/", "_", $file['name']);
        $this->type = $file['type'];
        $this->size = $file['size'];
        return true;



/*$path_parts = pathinfo('/www/htdocs/inc/lib.inc.php');

echo $path_parts['dirname'], "\n";
echo $path_parts['basename'], "\n";
echo $path_parts['extension'], "\n";
echo $path_parts['filename'], "\n"*/
     }
    }

    public function save_with_file(){

      if(!empty($this->errors)){return false;}
      if(empty($this->logo) || empty($this->temp_path) AND empty($this->file) || empty($this->temp_path)){
        $this->errors[] = "The file location was not avaliable.";
        return false;
      }
      $target_path = "../images/product/".$this->logo;
      $target_path = "../upload/document/".$this->file;
      if(move_uploaded_file($this->temp_path, $target_path)){
        if(static::find($this->product_id AND $this->file)){
          $this->update();
        }
        else{
        
          $this->create();
        }
        unset($this->temp_path);
        return true;
      }else {
        $this->errors[]= "The file uploads failed, possible due to incorrect permission on the upload folder";
        return false;
      }
    }

 	public  static function Product(){
	
    $display = "<div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>
                <ol class='carousel-indicators'>
                  <li data-target='#carousel-example-generic' data-slide-to='0' class='activ'><i class='fa fa-angle-left'></i>
                  </li>
                  <li data-target='#carousel-example-generic' data-slide-to='1'><i class='fa fa-angle-right'></i>
                  </li>
                </ol>
                <div class='carousel-inner' role='listbox'>
                  <div class='item active'>
                    <div class='row'>";
                      if($all = static::All() )
                      foreach ($all as $index => $product ){
                         if ($index != 0 && $index % 4==0)
          $display.="<div>
                      <div class='col-sm-3  col-lg-4'>
                      <div class='thumbnail'>
                        <span class='service-link text-center'>
                          <img class='img-responsive' src='images/product/<?php echo $product->logo?>' width='100' height='80' class='img-responsive'  alt=''>
                        </span>
                        <div class='caption'>
                          <div class='category'> category
                            <div class='pull-right'>
                              <i class='fa fa-star'></i>
                              <i class='fa fa-star'></i>
                              <i class='fa fa-star'></i>
                            </div>
                          </div>
                          <h4>Name:{$product->title}</h4>
                          <h5> Price: N$product->price /100</h5>
                          <h5>Description:  $product->descr</h6>
                          <h6>size  $product->size MB</h6>
                          <div><a href= 'login.php' class='btn btn-default' role='button'>Add to Cart</a><span class='pull-right'><i class='fa fa-heart-o'
                            ></i> Add to Wishlist</span>
                          </div>
                        </div>
                      </div>
                    </div>";}             
      $display.="</div>
                </div>
              </div>
    <script src='js/jquery.js'></script>
    <script src='bootstrap/js/bootstrap.min.js'></script>
    <script src='js/custom.js'></script>
</body>
<script type=text/javascript' src='js/bootstrap.min.jscol-lg-4 '></script>
</body>
</html>";
              echo $display;
            
          } 

public static function display(){



 $pro =" <div id='best-selling' class='carousel slide' data-ride='carousel'>
          <ol class='carousel-indicators'>
            <li data-target='#best-selling' data-slide-to='0' class='active'><i class='fa fa-angle-left'></i></li>
            <li data-target='#best-selling' data-slide-to='1'><i class='fa fa-angle-right'></i></li>
          </ol>
          <div class='carousel-inner' role='listbox'>
            <div class='item active'>
              <div class='row'>
                <div class='col-sm-6'>
                  <div class='media'>
                    ";
                    if($all =static::All())
             foreach ($all as $product){
                if($product->category == "Text Book"){    

                  $pro.="<div class='media-left'><img class='img-responsive' src='./images/product/<?php echo $product->logo?' alt=''></div>
                    <div class='media-body'>


                  <div class='category'> $product->category
                        <div class='pull-right'>
                          <i class='fa fa-star'></i>
                          <i class='fa fa-star'></i>
                          <i class='fa fa-star'></i>
                          <i class='fa fa-star'></i>
                          <i class='fa fa-star-o'></i>
                        </div>
                      </div>
                      <h3>$product->descr</h3>
                      <strong>N.$product->price /100</strong>

                   <div>
                        <a href='#' class='btn btn-default' role='button'>Add to Cart</a><span class='pull-right'><i class='fa fa-heart-o'></i> Add to Wishlist</span></div>
                    </div>
                    </div>
                </di>";}
                    
                  } 

                $pro.="   </div>
                          </div>
                        </div>
                      </div>
                    </div>
              ";
                echo $pro; 
   }  


   public static function show(){
    $show = '';



    $show.="<form method='POST'>

          <hr class=''/>
          " ;
            
          if($all =static::All())
             foreach ($all as $product){          

             
              
              $show.="
              <div class='col-sm-6 col-lg-4 col-md-6' id=''>
                 <ul class=''>
                   <span class='sticker-wrapper top-left'>
                      <img class='img-responsive' src='../images/product/<?php echo $product->logo?>' width='20' height='20' class='img-responsive'  alt=''>

                      <li>
                      <div class='row col-md-8 col-lg-9'>
                        <div class='caption '>
                          <strong style='color:green ;'> $product->title </strong>
                        </div>
                        <div>  
                          <h3 style='color:green ;'>$product->descr</h3>
                          <h5 style='color:green ;'>$product->publisher</h5>
                          <h5 style='color:green ;'>$product->size MB</h5>
                        </div> 
                        <h4><a class='btn-success btn' title='Click to view!' href='product_details.php?product_id={$product->getProductId()}'><i class='icon-check'></i> VIEW</a> <span class='pull-left 'style='color:green ;'php >Price: N $product->price </span></h4>
                         </div>     
                    </li>
                  </ul>
                </div>
              <center>


               </center>
                <br class=''/>



<div class='' >
  </div>
   </form>";}

$show.=" 
    
   
    <footer>
      <div class='footer-top'>
        <div class='container'>     
          <div class='row'> 
            <div class='col-sm-3'>
              <h2>About E-Market</h2>
              <div class='heading-border b-color-1'></div>
              <p>Nam apeirian assentior ei, utquo eros posse verterem. Cum eu error congue saperet. Te eam exerci vulputate consetetur,                 causae consulatu eaper,  apeirian assentior ei, utquo eros posse verterem. Cum eu error congue saperet. Te eam exerci                 vulputate consetetur, causae consulatu eaper</p>
              <div><a href='>Read More <i class='fa fa-angle-double-right'></i></a></div>
              <strong>Newsletter</strong>
              <form class='navbar-for' role='email'>
                <div class='form-group'>
                  <input type='text' class='form-control' placeholder='Email Address'>
                  <span class='nav-search'><a href='#'><i class='fa fa-envelope'></i></a></span>
                </div>  
              </form>
              <small>Eros posse verterem congue saperet.</small>
            </div>
            
            <div class='col-sm-3'>
              <h2>Latest News</h2>
              <div class='heading-border b-color-1'></div>
              
            </div>
            <div class='col-sm-3'>
              <h2>Contact us</h2>
              <div class='heading-border b-color-1'></div>
              <strong class='media-heading'>Address</strong>
              <p>Lebel 2, 13 Elezabe St, Melbounire, Victoria 3000, +8492575, USA</p>

              <strong class='media-heading'>Phone & Fax</strong>
              <p>+880183947930</p>
              <p>+(980)1839479</p>

              <strong class='media-heading'>E-Mail Address</strong>
              <p>support@gmail.com</p>
              <p>example@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
      <div class='footer-bottom'>
        <div class='container'>   
          <div class='row'> 
            <div class='col-sm-12 text-center'>
              <p>Copyright 2015 made by <a href='#'>Bootultra.com</a> & Disign by Shaifuddin. All Rights Reserved.</p>
              <ul class='list-inline center-block'>
                <li><a href='#'><img src='images/card-1.png'></a></li>
                <li><a href='#'><img src='images/card-2.png'></a></li>
                <li><a href='#'><img src='images/card-3.png'></a></li>
                <li><a href='#'><img src='images/card-4.png'></a></li>
                <li><a href='#'><img src='images/card-5.png'></a></li>
              </ul>
            </div>
          </div>
        </div>  
      </div>
    </footer>";
    echo $show;

   } 

   public  static function panel(){

    $panel = '';

 $panel = "<div id='mainBody' class='container'>
            <font color='green'><h3> Products </h3>
            <div class ='row'>"; 
      
if($all =static::All())
foreach ($all as $index=>$product){
  $product->price/= 100;
  if ($index != 0 && $index % 4==0)
    $panel.="</div>
  <div class ='row'>";

  $panel.= "<div class='col-lg-2  col-md-2'>
              <div class='panel panel-default '> 
                <div>
                 <img src='images/product/$product->logo' style='max-width: 80px; max-height: 80px;'/>
                 </div>
                <div class='panel-body'>
                  <strong> $product->title</strong>
                  <h4> $product->publisher</h4>
                  <h4> N$product->price </h4>
                  <h4>size:$product->size</h4>
                </div>
                <div class='panel-footer'>
                  <h4><a class='btn btn-success' title='Click to view!' href='user_product_details.php?id=$product->product_id'><i class='fa icon-check'></i> VIEW </a>

                
                </div>  
              </div>
            </div>";}

$panel.=" </div>    
          </font>   
          </div>";

echo $panel;
   }       
}
?>