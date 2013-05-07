<?php
	session_start();
	require_once'../config/requires.inc.php';

    $username = mysql_escape_string($_POST['logInusername']);
	$password = mysql_escape_string($_POST['logInpassword']);
	
	$result = UserAccount::validAccount($username,$password);
	
	if ($result==1){
		$id = UserAccount::getAId($username,$password);
		$_SESSION['id']=$id;
		print 'success';
	}else{
		print 'invalid credentials';
	}
?>