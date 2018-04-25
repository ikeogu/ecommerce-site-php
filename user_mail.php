
<?php
include('include/connect.php');
include('include/session.php');
?>

 <link rel="stylesheet" href="assets/bootstrap.min.css">
  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
 
<form method="post">
<center style="background-color:lightgrey">
<input  class="btn btn-success" type="submit" name="compose" value="Compose" />&nbsp;&nbsp;
<input class="btn btn-success" type="hidden" name="customer_id" value="<?php echo $ses_id; ?>" />
<input class="btn btn-success" type="submit" name="inbox" value="Inbox"><span class="badge badge-info"><?php include('query.php'); ?></span>&nbsp;&nbsp;
<input class="btn btn-success" type="submit" name="sent" value="Sent Messages" />
</center>
<br />
</form>

<!-- MESSAGE -->
<?php
	if(isset($_POST['compose'])){
?>
<?php
$query = mysql_query("select * from customers where customer_id='$ses_id'") or die(mysql_error());
$row = mysql_fetch_array($query);
	$query1=mysql_query("select * from customers where customer_id='$ses_id'");
    $row1=mysql_fetch_array($query1);
?>
  <form action="user_mail.php" method="post">
    <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="well">
<p align="center"><b>NAME </b>  <input type="text" class="form-control" name="name" value="<?php echo $row['Firstname']." ".$row['Lastname']; ?>" readonly /><br />
<b>EMAIL</b> <input type="text" name="email" class="form-control" value="<?php echo $row['Email']; ?>" readonly /><br />
<b>SUBJECT </b>
<br /><input type="text" class="form-control" name="subject" placeholder="Subject" required /><br />
<b>MESSAGE</b><br />
<textarea name="message" class="form-control" required></textarea><br />
<input type="submit" name="submit" value="SEND" class="btn btn-primary" /></p>
</form>
</div>
        </div>
        <div class="modal-footer">
        <form method="post">
        <input class="btn btn-success" type="hidden" name="customer_id" value="<?php echo $ses_id; ?>" />
          <input type="submit" name="" class="btn btn-default"  value="Close">
        </div>
      </div>
    </div>
  </div>
  </form>
      <script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });
</script>
<?php
	}
?>
<!-- sent message to admin -->
<?php
if(isset($_POST['submit'])){
	   $Name=$_POST['name'];
       $Email=$_POST['email'];
       $Subject=$_POST['subject'];
       $Message=$_POST['message'];
       date_default_timezone_set('Asia/Manila');
       $new =date('F j, Y g:i:a  ');
	   
	mysql_query("insert into message (ID,customer_id,Name,Email,Subject,Message,Date_created) values ('','$ses_id','$Name','$Email','$Subject','$Message','$new')") or die (mysql_error());  
    mysql_query("insert into sent_messages (ID,customer_id,Name,Email,Subject,Message,Date_created) values ('','$ses_id','$Name','$Email','$Subject','$Message','$new')") or die (mysql_error());  
?>
<script>
alert("Message Sent");

</script>
<?php
	}
?>
<!-- END --><!-- END MESSAGE -->

<!-- INBOX -->
<?php
	if(isset($_POST['inbox'])){
	   $inbox=$_POST['customer_id'];
      ?>
      <script language="JavaScript">
function toggle(source) {
checkboxes = document.getElementsByName('selector[]');
for(var i=0, n=checkboxes.length;i<n;i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
      <center><h2>INBOX</h2></center>
<form action="delete_inbox.php" method="post">
      <input type="submit" onclick="return confirm('Are you sure you want to delete?')" name="delete" class="btn btn-danger" value="Delete">
      <br/><strong>Click All: <input type="checkbox" onClick="toggle(this)" /></strong>
      <?php
	   if($inbox !="0")
	   $data=mysql_query("select * from reply_message where customer_id='$inbox'");
       while($row2=mysql_fetch_array($data)){
?>
<hr />
<input name="selector[]" type="checkbox" value="<?php echo $row2['Primary_key']; ?>"/>
<?php
$stat=$row2['Status'];
	if($stat != 'Seen'){
?>
<a href="user_inbox.php?id=<?php echo $row2['Primary_key']; ?>"><font color="red">Message from admin <?php echo $row2['From_admin'];?>.</font></a><p class="pull-right"><font color="gray"><?php echo $row2['Date_created']; ?></font></p><br />
<?php
}else{
    ?>
    <a href="user_inbox.php?id=<?php echo $row2['Primary_key']; ?>">Message from admin <?php echo $row2['From_admin'];?>.</a><p class="pull-right"><font color="gray"><?php echo $row2['Date_created']; ?></font></p><br />


    <?php
}
	}
    }   
?>
</form>
<!-- END INBOX -->
<!-- DELETE INBOX -->
<?php
if(isset($_POST['delete'])){
    $key=$_POST['key'];
    $result = mysql_query("DELETE FROM reply_message where Primary_key='$key'");
	
?>
<script>
alert('Message Deleted!');
window.location="user_mail.php";
</script>
<?php
	}
?>
<!--DELETE END -->
 
<!-- Sent message -->
<?php
	if(isset($_POST['sent'])){
	   $id=$_POST['customer_id'];
     echo '<center><h1>SENT MESSAGES</h1></center>';
       ?>
       <script language="JavaScript">
function toggle(source) {
checkboxes = document.getElementsByName('selector[]');
for(var i=0, n=checkboxes.length;i<n;i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
<form action="delete_sentmessage.php" method="post">
<input type="submit" onclick="return confirm('Are you sure you want to delete?')" name="delete" class="btn btn-danger" value="Delete">
<br/><strong>Click All: <input type="checkbox" onClick="toggle(this)" /></strong>
       <?php 
       $query2=mysql_query("select * from sent_messages where customer_id='$id'");
       while($row3=mysql_fetch_array($query2)){
?>
<hr />
<input name="selector[]" type="checkbox" value="<?php echo $row3['ID']; ?>"/>
<a href="user_sentmessage.php?id=<?php echo $row3['ID']; ?>">SUBJECT: <?php echo $row3['Subject']; ?></a><p class="pull-right"><font color="gray"><?php echo $row3['Date_created']; ?></font></p>
<?php
	}
    }
?>
</form>
<!-- end sent message -->
