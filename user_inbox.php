
<html>
<body>
 <link rel="stylesheet" href="assets/bootstrap.min.css">
  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
<?php
include('include/connect.php');
include('include/session.php');
include('query_seen.php');
$GET=$_GET['id'];
$query=mysql_query("select * from reply_message where Primary_key='$GET'");
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
     <div class="well"><Center>
<strong>To:</strong> <a href=""><?php echo $row['Email']; ?></a><br />
<strong>From Admin:</strong> <?php echo $row['From_admin'];?><br />
<strong>Message:</strong><br />
<textarea rows="4" cols="50" readonly><?php echo $row['Message']; ?></textarea>
<form action="user_mail.php" method="POST">
<br />
<input class="btn btn-success" type="hidden" name="customerid" value="<?php echo $ses_id; ?>" />
<input class="btn btn-success" type="hidden" name="key" value="<?php echo $row['Primary_key']; ?>" />
<input type="submit" value="BACK" name="inbox" class="btn btn-primary" />
<input type="submit" value="REPLY" name="compose" class="btn btn-primary" />
<input type="submit" onclick="return confirm('Are you sure you want to delete?')" value="DELETE" name="delete" class="btn btn-danger" />
</form>
</div></Center>
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
<div class="well"><Center>
<strong>To:</strong> <a href=""><?php echo $row['Email']; ?></a><br />
<strong>From Admin:</strong> <?php echo $row['From_admin'];?><br /><br />
<strong>Message:</strong><br />
<textarea rows="4" cols="50" readonly><?php echo $row['Message']; ?></textarea>
<form action="user_mail.php" method="POST">
<br />
<input class="btn btn-success" type="hidden" name="key" value="<?php echo $row['Primary_key']; ?>" />
<input class="btn btn-success" type="hidden" name="customerid" value="<?php echo $ses_id; ?>" />
<input type="submit" value="BACK" name="inbox" class="btn btn-primary" />
<input type="submit" value="REPLY" name="compose" class="btn btn-primary" />
<input type="submit" onclick="return confirm('Are you sure you want to delete?')" value="DELETE" name="delete" class="btn btn-danger" />
</form>
</div></Center>
</body>
</html>
