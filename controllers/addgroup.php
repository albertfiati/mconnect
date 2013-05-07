<?php
	session_start();
    require_once'../config/requires.inc.php';
	
	$type= $_POST['type'];
	$description = $_POST['description'];
	
	$uId = $_SESSION['id'];
	
	$group = new Groups($type,$description,$uId);	
	$addgroup = $group->createGroup();	
	
	if ($addgroup==1){
		print 'success';	
	}else{
		print 'Group creation failed';
	}
?>