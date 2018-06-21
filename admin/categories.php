<?php
include ("header2.php");
include_once '../includes/category.php';
include_once '../includes/function.php';
	$cat = new Categories();
	if(isset($_GET['cat_id']) && isset($_GET['opt'])){

     $categories = Categories::find($_GET['cat_id']);
     	if($_GET['opt']==0 && $_GET['cat_id'])
     		$categories->delete();
     	redirect ('categories.php');
     }
     $categories = Categories::All();

 ?>
<section class="row col-lg-offset-1" id="search-result">

	<table class=" table table-hover table-striped table-border ">
		<?php
		$table ='
				<thead>
				<th ><strong>S/NO</strong></th>
				
				<th><strong> category</strong></th>
				</thead>
		';
			if ($categories)
				foreach ($categories as $categories) {
					# code...
					$table.= "<tr>
									<td>{$categories->getcategoriesId()}</td>
									<td>{$categories->name}</td>
									<td><a class= 'btn btn-info btn-fill' href='editcategories.php?cat_id={$categories->getcategoriesId()}'>Edit</a></td>
 										<td><a class= 'btn btn-danger btn-fill' href='categories.php?cat_id={$categories->getcategoriesId()}&opt=0'>Delete</a></td>
							</tr>";
				}
				echo $table;
			
			

		?>
	</table>
</section>
<footer>
	<?php
include("footer2.php");
?>
</footer>
