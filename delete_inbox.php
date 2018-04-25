<?php
include('include/connect.php');

if (isset($_POST['delete'])){
    
    if(empty($_POST['selector'])){
      ?>  
      
      <script type="text/javascript">
        alert("Check some boxes to delete a message! ");
          window.location= "user_mail.php";
</script>  
        <?php
    }else{
        $id=$_POST['selector'];
        $N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM reply_message where Primary_key='$id[$i]'");
} 

?>
<script type="text/javascript">
        alert("Deleted successfully");
          window.location= "user_mail.php";
</script>
<?php

    }
}
?>