<?php
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
	$mid = $_POST['mid'];
	
	$update = Member::update($title,$firstname,$lastname,$middlename,$gender,$dob,$email,$mobile,$address,$dor,$doe,$mid);	
		
	if ($update==1){
		print 'success';	
	}else{
		print 'member creation failed';
	}
?>