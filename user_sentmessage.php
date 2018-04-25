<?php include("user_header.php");?>
<?php
include('includes/connect.php');
include('includes/session.php');
$GET=$_GET['id'];
$query=mysql_query("select * from sent_messages where ID='$GET'");
$row=mysql_fetch_array($query);
?>
<!-- Fixed navbar -->
   <form action="user_mail.php" method="post">
    <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <div class="well">
<center>
<strong>SENT MESSAGES</strong><br /><br />
<strong>To:</strong> <a href="">ADMIN</a><br />
<strong>From:</strong> <?php echo $row['Email'];?><br />
<strong>Message:</strong><br />
<textarea rows="4" cols="50" readonly><?php echo $row['Message']; ?></textarea><br /><br />
<input type="submit" value="BACK" name="sent" class="btn btn-primary" />
<form action="user_mail.php" method="POST">
</form>
</center>
</div>
        </div>
        <div class="modal-footer">
        <input class="btn btn-success" type="hidden" name="customerid" value="<?php echo $ses_id; ?>" />
          <input type="submit" name="sent" class="btn btn-default"  value="Close">
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
<center>
<img src="img/aa.jpg" height="" />
</center>
<div class="well"><center>
<strong>To:</strong> <a href="">ADMIN</a><br />
<strong>From:</strong> <?php echo $row['Email'];?><br />
<hr />
<strong>Message:</strong><br />
<textarea rows="4" cols="50" readonly><?php echo $row['Message']; ?></textarea><br />
<form action="user_mail.php" method="POST">
<input class="btn btn-success" type="hidden" name="customerid" value="<?php echo $ses_id; ?>" /><br />
<input type="submit" value="BACK" name="sent" class="btn btn-primary" />
</form>
</center>
</div>