<?php
	session_start();
    require_once'../config/requires.inc.php';
	
	$result = Member::selectAll($_SESSION['id']);
	$grpId = $_POST['grpId'];

	while($row = mysql_fetch_assoc($result)){
		$id=$row['memberId'];
		
		$gpMem = new Groupings($grpId,$id);
		
		if (!($gpMem->exist())){
			print "
			<div class='span3'><label class='checkbox'>
		      <input name='memberids[]' type='checkbox' value='".$row['memberId']."'> " . $row['lastname'] .", " . $row['firstname'] . " ". $row['othernames'] . "
		    </label></div>";
		}
	}
?>