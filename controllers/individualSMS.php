<?php
	session_start();
	$uId = $_SESSION['id'];
	
	require_once '../config/requires.inc.php';	
		
	$subject = $_POST['subject'];
	$salutation = $_POST['salutation'];
	$messageText = $_POST['message'];
	$recipient = trim($_POST['telephone']);
	$fname = trim($_POST['firstname']);
	$status = "true";
	$type = "sms";
	$date = new DateTime();
	$sentDate = $date -> format('d-m-Y H:i:s');
	
	$message = new Messages($subject,$messageText,$status,$sentDate,$recipient,$type,$uId);	
	
	if(isset($_SESSION['id']) && UserAccount::isEnabled($uId)){

			$number = $recipient;
			$messageTxt = urlencode($salutation . ' ' . $fname . ', ' . $messageText);
			
			$smsURL = "http://infoline.nandiclient.com/$accountname/campaigns/sendCampaign/$username/$password/$number/$messageTxt/$from";
						
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,  $smsURL);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			$res = curl_exec($ch);
			
			// if($res=='1700: Message has been sent to 1 recipients'){
				// print 'Message sent';
			// }else{
				// print 'Message not sent';
			// }
			//$sendMessage = $message->sendMessage();
	}else{
		print 'Your account is not configured to send SMS.';
	}
?>