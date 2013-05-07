<?php
	session_start();
     require_once'../config/requires.inc.php';
	
	$result = Subscription::getSubscriptions($_SESSION['id']);
	
	print "<option val='all'>Select group to filter result</option>";	
	
	while($row = mysql_fetch_assoc($result)){
		$id=$row['subscriptionId'];
		$type = $row['type'];
		print "<option value='$id'>$type</option>";		
	}
?>