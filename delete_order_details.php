<?php
include('includes/connect.php');
include('includes/session.php');
$get_id=$_GET['id'];

mysql_query(" DELETE from order_details where orderdetails_id='$get_id' ")or die(mysql_error());

$query3=mysql_query(" SELECT * from order_details where customer_id='$session->user_id'") or die (mysql_error());
$count2=mysql_num_rows($query3);
?>

<?php
	if($count2=="0" ){
	   
?>
<script type="text/javascript">
        alert("Deleted successfully");
          window.location= "user_products.php";
</script>
<?php
	}else{
?>

<script type="text/javascript">
        alert("Deleted successfully");
          window.location= "product_summary.php";
</script>

<?php
	}
?>
