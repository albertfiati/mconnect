<?php
	session_start();
	$uId = $_SESSION['id'];
	require_once '../config/requires.inc.php';
	
	$subject = $_POST['subject'];
	$salutation = $_POST['salutation'];
	$messageText = $_POST['message'];
	$email = trim($_POST['email']);
	$fname = trim($_POST['firstname']);
	$status = "true";
	$type = "email";
	$date = new DateTime();
	$sentDate = $date -> format('d-m-Y H:i:s');
	$header = "From:awkfiati@gmail.com";
	
	$message = new Messages($subject,$messageText,$status,$sentDate,$email,$type,$uId);	
	
	$messageTxt = $salutation . ' ' . $fname . ', ' . $messageText;
	$to = $email;
	print mail($to,$subject,$messageTxt,$header);	
	
	print $to . ',' . $messageTxt . ', ' .$subject. ', '.$header;	
?>