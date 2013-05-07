<?php
	session_start();
    require_once'../config/requires.inc.php';
		
	$result = Groups::getGroups($_SESSION['id']);
	
	while($row = mysql_fetch_assoc($result)){
		$type = $row['type'];
		print "<option value='$type'>$type</option>";
	}
	
?>