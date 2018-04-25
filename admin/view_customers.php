<?php
include("header2.php");
	include_once '../includes/customer.php';
	include_once 'includes/function.php';

	$msg='';
	if (isset($_GET['id']) && isset($_GET['opt'])){
		$customer = Customer::find($_GET['id']);
		if($_GET['opt']==0 && $customer)
			$customer->delete();
		redirect ('customers.php');
	}
	$customer = Customer::All();



?>
<section class="container" id="signupsection">
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
 	<section class="row" id="search-result">

 		<table class=" table table-hover table-striped table-border ">
 			<?php
 				$table ='';
 				if ($customer){
 					foreach ($customer as $customer) {
 						# code...
 						$table.= "<tr>
 										<td>{$customer->getCustomerId()}</td>
 										<td>{$customer->username}</td>
 										<td>{$customer->email}</td>
 										<td>{$customer->phone}</td>
 										<td><a class= 'btn btn-info' href='customer_edit.php?id={$customer->customer_id}'>Edit</a></td>
 										<td><a class= 'btn btn-info' href='customers.php?id={$customer->customer_id}&opt=0'>Delete</a></td>
 								</tr>";
 					}
 					echo $table;
 				}

 			?>
 		</table>
 	</section>
 </section>

