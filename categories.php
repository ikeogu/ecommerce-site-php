<?php

include_once 'includes/category.php';
include_once 'includes/admin.php';
include_once 'includes/session.php';
include_once 'includes/function.php';
if(!($session->is_logged_in())) redirect('adminlogin.php');
     $result = '';
    $admin = Admin::find($session->user_id);
	if(isset($_GET['id'])){
    $cat_id = $_GET['id'];
     $categories = Categories::find($cat_id);
     	if($_GET['opt']==0 && $categories)
     		$categories->delete($cat_id);
     	redirect ('categories.php');
     }
     $categories = Categories::All();
  
?>
<body class="container">
    <?php
include("header2.php");
    ?>
    <section class="row col-lg-offset-1" id="search-result">

    	<table class=" table table-hover table-striped table-border ">
    		<?php
    		$table ='';
    			if ($categories)
    				foreach ($categories as $categories) {
    					# code...
    					$table.= "<tr>
    									<td>{$categories->getcategoriesId()}</td>
    									<td>{$categories->name}</td>
    									<td><a class= 'btn btn-info' href='editcategories.php?cat_id={$categories->getcategoriesId()}'>Edit</a></td>
     										<td><a class= 'btn btn-info' href='categories.php?cat_id={$categories->getcategoriesId()}&opt=0'>Delete</a></td>
    							</tr>";
    				}
    				echo $table;
    			
    			

    		?>
    	</table>
    </section>

<?php
include("footer2.php");
?>
</body>