<?php
	session_start();
	$uId = $_SESSION['id'];
	
	require_once '../config/requires.inc.php';	
	
	$username = $_POST['username'];
	$orgName = $_POST['orgname'];
	$email = $_POST['email'];
	
	UserAccounts::update($username,$orgName,$email,$id);
?>