<?php
	session_start();
    require_once'../config/requires.inc.php';
	
	$subId = $_POST['subId'];
	
	$result = Groupings::listGroupMembers($_SESSION['id'],$subId);
	
	$counter = 1;
	while($row = mysql_fetch_assoc($result)){
		$id=$row['memberid'];
		print "
		<tr>		
			<td id='memtabnum'>". $counter ." </td>
			<td id='memtabname'>". $row['lastname'] .", " . $row['firstname'] . " ". $row['othernames'] ."</td>
			<td id='memtabgender'>". $row['gender'] ."</td>
			<td id='memtabemail'>". $row['email'] ."</td>
			<td id='memtabphone'>". $row['telephone'] ."</td>
			<td id='memtabaddress' class='span3'>". $row['address'] ."</td>
			<td id='memtabicons'><a class='btn icon-zoom-in' onclick=\"bootbox.prompt('Details of Albert Fiati', function(result) { }); md();\"></a>
								 <a class='btn icon-pencil' onclick=\"bootbox.prompt('Edit Albert Fiati', function(result) { }); md();\"></a>
								 <a class='btn icon-trash' onclick=\"bootbox.confirm('Do you want to delete this member?', 
								 							function(result){deleteRecord('member',$id,'');});\"></a></td>
		</tr>";
		
		$counter ++;
	}
?>