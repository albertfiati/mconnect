<?php
    session_start();
    require_once'../config/requires.inc.php';
	
	$uId = $_SESSION['id'];
	
	$oldPassword = mysql_escape_string($_POST['oldPassword']);
	$newPassword = mysql_escape_string($_POST['newPassword']);
	$confirmPassword = mysql_escape_string($_POST['confirmPassword']);
	
	print UserAccount::resetPassword($uId,$oldPassword,$newPassword,$confirmPassword);	
?>