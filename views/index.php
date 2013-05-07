<?php
	$to ='awkfiati@gmail.com';
	$header = 'From:awkfiati@gmail.com';
	$subject ="tryn";
	$message = "you have to work";
	
	print '</br>'.$to;
	print '</br>'.$header;
	print '</br>'.$message;
	print '</br>'.$subject;
	print '</br>'.mail($to, $subject, $message, $header);
	var_dump(mail($to, $subject, $message, $header));
?>