<?php
   /* function  message ($header, $message, $dismisable){
      $alert = '';
    $alert_class = 'alert';                                                                             
    if ( $header ) $alert_class += 'alert-'.$header;
    if ( $dismisable ) $alert_class += ' alert-dismissable';

     $alert = '<div class="'.$alert_class.'">'.$message.'</div>';
     return $alert;
    

  }*/
   function redirect ($location = ''){
   	header("location: $location");
   } 


    function ageCalulator($dob){
           if(!empty($dob)){
             $birthday = new DateTime($dob);
             $today = new DateTime('today');
             $age = $birthday->diff($today)->y;
             return $age;
           }else {
             return 0;
           }
    }
           

?>