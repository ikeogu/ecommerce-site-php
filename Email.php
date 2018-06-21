<?php
$to = "ikeogu322@gmail.com";
$subject = "it is my own message";
$txt = "This is just a message";
$headers = "From: youremail@gmail.com"."\r\n" .
"CC: somebodyelse@example.com";

if (mail($to,$subject,$txt,$headers)){
 echo 'message sent  by this time() ';
}

 else{ echo 'unsuccessful';
 var_dump(mail($to,$subject,$txt,$headers));
}

?>  