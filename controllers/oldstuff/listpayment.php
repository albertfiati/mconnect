<?php
	session_start();
    require_once'../config/requires.inc.php';
	
	$result = Payment::selectAll($_SESSION['id']);
	$counter = 1;
	while($row = mysql_fetch_assoc($result)){
		$id=$row['paymentId'];
		print "
		<tr>
			<td>". $counter ." </td>
			<td>". Member::getMemberName($row['member_id']) ."</td>
			<td>". $row['payee'] ."</td>
			<td>". Subscription::getSubName($row['subscriptionId']) ."</td>
			<td style='text-align:right; padding-right:40px;'>". $row['amount_paid'] ."</td>
			<td>". $row['paymentDate'] ."</td>
			<td><a class='btn icon-zoom-in' onclick='bootbox.prompt('Details of Albert Fiati', function(result) { }); md();'></a>
								 <a class='btn icon-pencil' onclick='bootbox.prompt('Edit Albert Fiati', function(result) { }); md();'></a>
								 <a class='btn icon-trash' onclick=\"bootbox.confirm('Do you want to delete this payment record?', 
								 								function(result){deleteRecord('payment',$id), listpayment();});\"></a></td>
		</tr>";
		
		$counter ++;
	}
?>