<?php 

	include_once 'session.php';

	$session->logout();
	header("Location: ../adminlogin.php");

?>