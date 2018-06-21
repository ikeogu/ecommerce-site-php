<?php
	include_once 'includes/session.php';
	include_once 'PHPMailer-FE_v4.11/_lib/class.phpmailer.php';

	  /* config end *//* config end */
	$url = "http://domain.com/files=".$file_name;
	//require  "../server/php/upload.class.php";
	session_name("fancyform");

	foreach($_POST as $k => $v){
	    if(ini_get('magic_quotes_gpc'))
	    	$_POST[$k]=stripslashes($_POST[$k]);

	      $_POST[$k]=htmlspecialchars(strip_tags($_POST[$k]));
	 	}

	   $err = array ();

	  if(!checkLen('name'))
	    $err []='The name field is too short or empty!';

	  if(!checkLen('email'))
	    $err[]='The email field is too short or empty!';
	 elseif(!checkEmail($_POST['email']))
	    $err[]= 'Your email is not valid!';

	  if(!checkLen('subject'))
	     $err[]='You have not selected a subject!';

	  if(!checkLen('message'))
	     $err[]='The message field is too short or empty!';

	  if((int) $_POST['captcha']  != $_SESSION['expect'])
	    $err [] ='The captcha code is wrong!';


	   if(count($err)){
	        if($_POST['ajax']){
	           echo '-1';
	        }
	        elseif($_SERVER['HTTP_REFERER']){
	        $_SESSION ['errStr']  =  implode('<br />',$err);
	        $_SESSION ['post']=  $_POST;

	        header('Location: '.$_SERVER['HTTP_REFERER']);
	    }
	    exit;
	}

	$usrname = $_POST['name'];
	$emailAddress = $_POST['email'];
	$url = $_POST['url'];

	$msg=
	'Name:  '.$usrname.'<br />
	Email:  '.$emailAddress.'<br />
	Download: '.$url.'<br />
	Message:<br /><br />'.nl2br($_POST['message']).'';


	$mail =  new PHPMailer();
	$mail ->IsMail();

	$mail ->AddReplyTo($_POST['email'], $_POST['name']);
	$mail ->AddAddress($emailAddress);
	$mail ->SetFrom($_POST['email'],$_POST['name']);
	$mail ->Subject =  "A new ".mb_strtolower($_POST['subject'])." from ".$_POST['name']." | contact form feedback";

	$mail ->MsgHTML($msg);

	$mail  ->Send();

	unset($_SESSION['post']);

	if($_POST['ajax']){
	     echo '1';
	}else{
	    $_SESSION['sent']=1;

	    if($_SERVER['HTTP_REFERER'])
	       header('Location: '.$_SERVER['HTTP_REFERER']);
	    exit;
	}

	function checkLen($str,$len =2) {
	    return  isset($_POST[$str]) && mb_strlen(strip_tags($_POST[$str]),"utf-8")  > $len;
	}

	function  checkEmail($str){
	    return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
	} 
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<td class="download">
                <a href="{%=file.url%}" class="btn modal-download" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">
                <i class="icon-download"></i>
                Download</a>
</td>
<td class="mail">
                <div id="form-container">
    <h1>Fancy Contact Form</h1>
    <h2>Drop us a line and we will get back to you</h2>

    <form id="contact-form" name="contact-form" method="post" action="fancymail/submit.php">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="15%"><label for="name">Name</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="name" id="name" value="<?=$_SESSION['post']['name']?>" /></td>
          <td width="15%" id="errOffset">&nbsp;</td>
        </tr>
        <tr>
          <td><label for="email">Email</label></td>
          <td><input type="text" class="validate[required,custom[email]]" name="email" id="email" value="<?=$_SESSION['post']['email']?>" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="subject">Subject</label></td>
          <td width="70%"><input type="text" class="validate[required,custom[onlyLetter]]" name="subject" id="subject" value="<?=$_SESSION['post']['subject']?>" /></td>
          <!--<td><select name="subject" id="subject">
            <option value="" selected="selected"> - Choose -</option>
            <option value="Question">Question</option>
            <option value="Business proposal">Business proposal</option>
            <option value="Advertisement">Advertising</option>
            <option value="Complaint">Complaint</option>
          </select>          </td>-->
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><label for="message">Message</label></td>
          <td><textarea name="message" id="message" class="validate[required]" cols="35" rows="5"><?=$_SESSION['post']['message'] ?></textarea></td>
          <!--efoula-->

          <!--efoula-->
          <td valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td><label for="captcha"><?=$_SESSION['n1']?> + <?=$_SESSION['n2']?> =</label></td>
          <td><input type="text" class="validate[required,custom[onlyNumber]]" name="captcha" id="captcha" /></td>
          <td valign="top">&nbsp;</td>
        </tr>
       <td class="download">
                <input type = "hidden" name="url" value="{%=file.url%}">
       </td>
        <tr>
          <td valign="top">&nbsp;</td>
          <td colspan="2"><input type="submit" name="button" id="button" value="Submit" />
          <input type="reset" name="button2" id="button2" value="Reset" />

          <?=$str?>          <img id="loading" src="img/ajax-load.gif" width="16" height="16" alt="loading" /></td>
        </tr>
      </table>
      </form>
      <?=$success?>
    </div>
            </td>




</body>
</html>

