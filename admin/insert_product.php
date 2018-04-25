<?php
include("functions.php");


?>


<body>
<div class="container">
 <h1 align="center"> ADD BOOK </h1>
 <div class="row">
 <div class="col-md-12">


<form action="insert_product.php" method="post" enctype="multipart/form-data">

<table align="center" width="1000" border="2">
<tr align="center">
<td colspan="8"><h2>Insert New Book Here</h2></td>
</tr>

<tr>
<td align="center">Product Tile:</td>
<td><input type="text" name="product_title" required/></td>
</tr>

<tr>
<td align="center">Product Category:</td>
<td>
<select name="product_cat">
<option>Select A Category.
</option>
<?php

$get_cats="select * from categories";
$run_cats=mysql_query($con,$get_cats);

while($row_cats=mysql_fetch_array($run_cats))
{
$cat_id=$row_cats['cat_id'];
$cat_title=$row_cats['cat_title'];

echo "<option value='$cat_id'>$cat_title</option>";
 
}


?>

</select>
</td>
</tr>

<tr>
<td align="center">Product Brand:</td>
<td>
<select name="product_brand">
<option>Select An Area
</option>
<?php

$get_brands="select * from brands";
$run_brands=mysql_query($con,$get_brands);

while($row_brands=mysql_fetch_array($run_brands))
{
$brand_id=$row_brands['brand_id'];
$brand_title=$row_brands['brand_title'];

echo "<option value='$brand_id'>$brand_title</option>";
 
}


?>


</td>
</tr>

<tr>
<td align="center">Product Image:</td>
<td><input type="file" name="product_image"  required="required"/></td>
</tr>

<tr>
<td align="center">Product Price:</td>
<td><input type="text" name="product_price" required></td>
</tr>

<tr>
<td align="center">Product Description:</td>
<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
</tr>

<tr>
<td align="center">Product Keywords:</td>
<td><input type="text" name="product_keywords" size="50" required/></td>
</tr>

<tr align="center">

<td colspan="8"><input type="submit" name="insert_post" value="insert now" /></td>
</tr>

</table>

</form>

<?php

getscripts();

?>




</body>

</html>


<?php

if(isset($_POST['insert_post']))
{
	$product_title=$_POST['product_title'];
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brand'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_keywords=$_POST['product_keywords'];
	

    $product_image=$_FILES['product_image']['name'];
	$product_image_tmp=$_FILES['product_image']['tmp_name'];
	
	move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
	$insert_product="insert into products(product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords)values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
	


$insert_pro=mysql_query($con,$insert_product);


if($insert_pro)	
{
	echo "<script>
	
	alert('product has been inserted');
	</script>";
	echo "<script>window.open('insert_product.php','_self')
	</script>";
	
}
}
?>
