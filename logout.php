<?php
include_once'includes/function.php';
session_start();


session_destroy();

redirect('login.php');

?>