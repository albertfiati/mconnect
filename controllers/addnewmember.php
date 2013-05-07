<?php
	session_start();
    require_once'../config/requires.inc.php';
	
	$title = $_POST['title'];
	$gender = $_POST['gender'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middlename = $_POST['middlename'];
	$dob = $_POST['dob'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$dor = $_POST['dor'];
	$doe = $_POST['doe'];
	$uId = $_SESSION['id'];
	
	$member = new Member($title,$firstname,$lastname,$middlename,$gender,$dob,$email,$mobile,$address,$dor,$doe,$uId);	
	$addmember = $member->addMember();	
	$pId = $member->getId();
	
	if ($addmember==1){
		print 'success';	
	}else{
		print 'member creation failed';
	}
?>