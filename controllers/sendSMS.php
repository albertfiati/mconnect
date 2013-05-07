<?php
	session_start();
	require_once '../config/requires.inc.php';	
		
	$subject = $_POST['subject'];
	$salutation = $_POST['salutation'];
	$messageText = $_POST['message'];
	$recipient = trim($_POST['recipient']);
	$status = "true";
	$type = "sms";
	$date = new DateTime();
	$sentDate = $date -> format('d-m-Y H:i:s');

	$uId = $_SESSION['id' ];
	
	$message = new Messages($subject,$messageText,$status,$sentDate,$recipient,$type,$uId);	
			
	if(isset($_SESSION['id']) && UserAccount::isEnabled($uId)){
		if ($recipient!==""){
		if (trim($recipient) == 'All') {
			$result = Member::selectAll($_SESSION['id']);
			
			$count = 0;
			
			while ($row = mysql_fetch_assoc($result)) {
				$number = $row['telephone'];
				$fname = $row['firstname'];
				$messageTxt = urlencode($salutation . ' ' . $fname . ', ' . $messageText);
				
				$smsURL = "http://infoline.nandiclient.com/$accountname/campaigns/sendCampaign/$username/$password/$number/$messageTxt/$from";
							
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,  $smsURL);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				$res = curl_exec($ch);
				
				if($res=='1700: Message has been sent to 1 recipients'){
					$count++;
				}
			}
			
			//print $count ." messages sent" ;	
			//$sendMessage = $message->sendMessage();
		} else {
			$grpId = Groups::getGroupId($recipient, $_SESSION['id']);
			$result = Groupings::listGroupMembers($_SESSION['id'], $grpId);
			
			$count = 0;
			
			while ($row = mysql_fetch_assoc($result)) {
				$number = $row['telephone'];
				$fname = $row['firstname'];
				$messageTxt = urlencode($salutation . ' ' . $fname . ', ' . $messageText);
				
				$smsURL = "http://infoline.nandiclient.com/$accountname/campaigns/sendCampaign/$username/$password/$number/$messageTxt/$from";
			
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,  $smsURL);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				$res = curl_exec($ch);
				
				$res = curl_exec($ch);
				
				if($res=='1700: Message has been sent to 1 recipients'){
					$count++;
				}
			}
 			
			print $count ." messages sent" ;		
			// $sendMessage = $message -> sendMessage();
		}			
	}
	}else{
		print 'Your account is not configured to send SMS.';
	}
?>