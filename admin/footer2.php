<footer class="footer">
  <div class="container-fluid">
    <nav class="pull-left">
      <ul>
        <li>
          <a href="index.php">
             Home
          </a>
        </li>
        <li>
          <a href="#">
            Company
          </a>
        </li>
                        
        </li>
      </ul>
      <p class="copyright pull-right">HELDY pRODUCTS..
                    &copy; <script>document.write(new Date().getFullYear())</script> 
                </p>
    </nav>         
  </div>
</footer>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
<script src="assets/js/notify.js">
         
         //add a new style 'foo'
$.notify.addStyle('foo', {
  php: 
    "<div>" +
      "<div class='clearfix'>" +
        "<div class='title' data-notify-php='title'/>" +
        "<div class='buttons'>" +
          "<button class='no'>Cancel</button>" +
          "<button class='yes' data-notify-text='button'></button>" +
        "</div>" +
      "</div>" +
    "</div>"
});

//listen for click events from this style
$(document).on('click', '.notifyjs-foo-base .no', function() {
  //programmatically trigger propogating hide event
  $(this).trigger('notify-hide');
});
$(document).on('click', '.notifyjs-foo-base .yes', function() {
  //show button text
  alert($(this).text() + " clicked!");
  //hide notification
  $(this).trigger('notify-hide');
});
     </script>

   