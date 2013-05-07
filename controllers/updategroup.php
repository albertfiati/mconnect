<?php	
    require_once'../config/requires.inc.php';
	
	$grpId = $_POST['grpId'];
	$type = $_POST['type'];
	$description = $_POST['description'];
	
	$update = Groups::update($type,$description,$grpId);	
		
	if ($update==1){
		print 'success';	
	}else{
		print 'member creation failed';
	}
?>