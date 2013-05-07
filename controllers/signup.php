<?php
	session_start();
    require_once'../config/requires.inc.php';
	
	$orgName = mysql_escape_string($_POST["orgName"]);
	$email = mysql_escape_string($_POST["email"]);
	$username = mysql_escape_string($_POST["username"]);
	$password = mysql_escape_string($_POST["password"]);
	$confPassword = mysql_escape_string($_POST["confPassword"]);
	
	if ($password==$confPassword){
		$userAccount = new UserAccount($orgName,$email,$username,$password);
		
		$result = $userAccount->createAccount();
		
		if ($result==1){
			$id = $userAccount->getId();
			$_SESSION['id']=$id;
			print 'success';
		}else{
			print $result;
		}
	}else{
		print "Password does not match!";
	}
?>