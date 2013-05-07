<?php
	session_start();
	 require_once'../config/requires.inc.php';
	
	
	$groupId = $_POST['grpId'];
    $memberIds = $_POST['memberids'];
	
	foreach ($memberIds as $id) {
		$grpMember = new Groupings($groupId,$id);
		$grpMember->joinGroup();
	}
?>