<?php
	session_start();
    require_once'../config/requires.inc.php';
		
	$result = Person::getFullname($_SESSION['id']);
	
	while($row = mysql_fetch_assoc($result)){
		$fullname = $row['lastname'] .' '. $row['firstname'] . ' ' . $row['othernames'];		
		print "<option value='$fullname'>$fullname</option>";
	}
	
?>