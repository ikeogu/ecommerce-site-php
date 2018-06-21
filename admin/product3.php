<?php
include ("header2.php");
include_once '../includes/product.php';
//include_once '../includes/session.php';
include_once '../includes/function.php';
//if(!($session->is_logged_in())) redirect('login.php');

    //$product = Product::find($product_id);
    // $product = Product::delete($product_id);
	if(isset($_GET['id'])&& isset($_GET['opt'])){
    $product_id = $_GET['id'];
     $product = Product::find($product_id);
     	if($_GET['opt']==0 && $product)
     		$product->delete();
     	redirect ('product.php');
     }
     $product = Product::All();
  
?>
<body class="container">
<section class="row col-md-offset-1" id="search-result">

	<table class=" table table-hover table-striped table-border ">
		<?php
		
			$table ='
				<thead>
				<th ><strong>S/NO</strong></th>
				<th><strong>Title</strong></th>
				<th><strong>File</strong></th>
				<th><strong>Category</strong></th>
				<th><strong>Quantity</strong></th>
				</thead>
			';
			if ($product)
				foreach ($product as $product) {
					# code...

					$table.= "<tr>
									<td>{$product->getProductId()}</td>
									<td>{$product->title}</td>
									<td>{$product->file}</td>
									<td>{$product->category}</td>
									<td>{$product->quantity}</td>
									<td><a class= 'btn btn-info btn-fill' href='editproduct.php?product_id={$product->getProductId()}'>Edit</a></td>
 										<td><a class= 'btn btn-danger btn-fill' href='product3.php?product_id={$product->getProductId()}&opt=0'>Delete</a></td>
							</tr>";
				}
				echo $table;
			

		?>
	</table>
</section>
<div>
	<?php include_once 'footer2.php';?>
</div>
</body
