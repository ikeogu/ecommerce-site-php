<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
require_once 'create_link.php';
// create link
$connParam = array(
		'host' => 'localhost',
		'user' => 'root',
		'pass' => '',
		'db'   => 'heldy_products'
);
$link = 'http://localhost/e2e/download/';
$expiryDay = 7;
$createLinkObj = new createSecureDownloadLink($link, $connParam, $expiryDay);
$createLinkObj->createLink();
?>