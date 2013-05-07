<?php
	session_start();
    require_once'../config/requires.inc.php';
	
	$result = Member::selectAll($_SESSION['id']);
	$counter = 1;
	
	while($row = mysql_fetch_assoc($result)){
		$id=$row['memberId'];
		print "
		<tr>		
			<td id='memtabnum'>". $counter ." </td>
			<td id='memtabname'>". $row['lastname'] .", " . $row['firstname'] . " ". $row['othernames'] ."</td>
			
			<td id='memtabemail'>". $row['email'] ."</td>
			<td id='memtabphone'>". $row['telephone'] ."</td>
			<td id='memtabaddress' style='width:210px;'>". substr($row['address'], 0,50) ."</td>
			<td id='memtabicons'><a class='btn icon-envelope' onclick=\"bootbox.dialog('Contact ". $row['firstname']. "', [{'label' : 'Send Message',
																								    'class' : 'btn-success',
																								    'callback': function() {
																								    	sendIndividualMessage();}}, 
																								   {'label' : 'Cancel',
																								    'class': 'btn-danger',
																								    'callback':function(){}}
																								  ]);
																														  
								  sendMessage('". $row['firstname'] . "','". $row['telephone'] . "','". $row['email'] . "');
								 \"></a>
			
								 <a class='btn icon-pencil' onclick=\"bootbox.dialog('Edit member details',[{'label' : 'Update',
																										    'class' : 'btn-success',
																										    'callback': function() {
																										    						memberUpdate();																										    						
																																	}},
																										    {'label' : 'Cancel',
																										    'class' : 'btn-danger',
																										    'callback': function() {}}]);
																																				  
								 editMember('" . $row['title'] ."','". $row['firstname'] . "','". $row['othernames'] . "','".  $row['lastname'] . "','". $row['gender']
								 . "','". $row['dob'] . "','". $row['telephone'] . "','". $row['email'] . "','". $row['address'] . "','". $row['memberId'] . "');
								 listMembers();
								 \"></a>
								 							
								 <a class='btn icon-trash' onclick=\"bootbox.confirm('Do you want to delete $row[firstname]\'s record?', 
								 																					function(result){
								 																									   if(result){
								 																									   	
								 																									   	deleteRecord('member',$id);
								 																									    listMembers();}
								 																									 });\"></a></td>
		</tr>";
		
		$counter ++;
	}
?>