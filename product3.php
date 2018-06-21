<?php
include ("header.php");
include_once 'includes/product.php';
include_once 'includes/session.php';
include_once 'includes/function.php';

    //$product = Product::find($product_id);
    // $product = Product::delete($product_id);
	if(isset($_GET['id'])){
    $product_id = $_GET['id'];
     $product = Product::find($product_id);
     	if($_GET['opt']==0 && $product)
     		$product->delete($product_id);
     	redirect ('product.php');
     }
     $product = Product::All();
  
?>

<section class="row" id="search-result">

	<table class=" table table-hover table-striped table-border ">
		<?php
		
			$table ='';
			if ($product)
				foreach ($product as $product) {
					# code...
					$table.= "<tr>
									<td>{$product->getProductId()}</td>
									<td>{$product->name}</td>
									<td><a class= 'btn btn-info' href='editproduct.php?product_id={$product->getProductId()}'>Edit</a></td>
 										<td><a class= 'btn btn-info' href='product.php?product_id={$product->getProductId()}&opt=0'>Delete</a></td>
							</tr>";
				}
				echo $table;
			

		?>
	</table>
</section>
<?php
include("footer.php");
?>