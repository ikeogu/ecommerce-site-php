<?php
	include_once '../includes/customer.php';
	include_once 'includes/function.php';
	include("header2.php");

	$msg='';
	if (isset($_GET['id']) && isset($_GET['opt'])){
		$customer = Customer::find($_GET['id']);
		if($_GET['opt']==0 && $customer)
			$customer->delete();
		redirect ('customers.php');
	}
	$customer = Customer::All();
?>

 <body class="container" >
 	
 	<article class="col col-lg-9 col-md-8  col-xs-9">
 		<div class="row">
 		
 		</div>
 		<div class="row">
 			<h3>Customers</h3>
 		</div>
 	</article>
	<div class="row">
	    <div class="input-group">
	      <span class="input-group-addon">
	        <span class="glyphicon glyphicon-search"></span>
	      </span>
	      <input type="text" name="" class="form-control" placeholder="email" id="searcher">
	    </div>
	</div>  
 	<section class="row col-lg-offset-1" id="search-result">

 		<table class=" table table-hover table-striped table-border ">
 			<?php
 				$table ='';
 				if ($customer){
 					foreach ($customer as $customer) {
 						# code...
 						$table.= "<tr>
 										<td>{$customer->getCustomerId()}</td>
 										<td>{$customer->username}</td>
 										<td>{$customer->getCustomerEmail()}</td>
 										<td>{$customer->phone}</td>
 										<td><a class= 'btn btn-info btn-fill' href='customer_edit.php?id={$customer->getCustomerId()}'>Edit</a></td>
 										<td><a class= 'btn btn-danger btn-fill' href='customers.php?id={$customer->getCustomerId()}&opt=0'>Delete</a></td>
 								</tr>";
 					}
 					echo $table;
 				}

 			?>
 		</table>
 	</section>
 	 <?php
include("footer2.php");

 ?>
 </body>


