<?php
	session_start();
	require_once '../config/requires.inc.php';
	
	$subject = $_POST['subject'];
	$salutation = $_POST['salutation'];
	$messageText = $_POST['message'];
	$recipient = trim($_POST['recipient']);
	$status = "true";
	$type = "email";
	$date = new DateTime();
	$sentDate = $date -> format('d-m-Y H:i:s');
	$header = "From:awkfiati@gmail.com";
	
	$uId = $_SESSION['id' ];
	
	$message = new Messages($subject,$messageText,$status,$sentDate,$recipient,$type,$uId);	
		
	if ($recipient!==""){
		if (trim($recipient) == 'All') {
			$result = Member::selectAll($_SESSION['id']);

			while ($row = mysql_fetch_assoc($result)) {
				$email = $row['email'];
				$fname = $row['firstname'];
				$messageTxt = $salutation . ' ' . $fname . ', ' . $messageText;
				
				mail($email,$subject,$messageTxt,$header);		
			}
			$sendMessage = $message -> sendMessage();
			
		} else {
			$grpId = Groups::getGroupId($recipient, $_SESSION['id']);
			$result = Groupings::listGroupMembers($_SESSION['id'], $grpId);
						
			while ($row = mysql_fetch_assoc($result)) {
				$email = $row['email'];
				$fname = $row['firstname'];
				$messageTxt = $salutation . ' ' . $fname . ', ' . $messageText;
				
				print mail($email,$subject,$messageTxt,$header);						
			}
 						
			//$sendMessage = $message -> sendMessage();
		}			
	}
?>