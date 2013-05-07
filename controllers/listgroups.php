<?php
	session_start();
    require_once'../config/requires.inc.php';
	
	$result = Groups::selectAll($_SESSION['id']);
	$counter = 1;
	while($row = mysql_fetch_assoc($result)){
		$id=$row['groupId'];
		print "
		<tr>
			<td id='subtabnum'>". $counter ." </td>
			<td id='subtabname'>". $row['type'] ."</td>
			<td id='subtabgender'>". $row['description'] ."</td>
			<td id='subtabicons'><a class='btn icon-plus' onclick=\"bootbox.dialog('Add Members to group',[{'label' : 'Add Members',
																								    'class' : 'btn-success',
																								    'callback': function() {
																								    	addToGroup();}}, 
																								   {'label' : 'Cancel',
																								    'class': 'btn-danger',
																								    'callback':function(){}}
																								  ]); listMemNames($id);\"></a>
								 <a class='btn icon-pencil' onclick=\"bootbox.dialog('Edit Group',[{'label' : 'Update Group',
																								    'class' : 'btn-success',
																								    'callback': function() {
																								    	groupUpdate();
																								    	listGroups();}}, 
																								   {'label' : 'Cancel',
																								    'class': 'btn-danger',
																								    'callback':function(){}}
																								  ]); editGroup('".$id."','".$row['type']."','".$row['description']."');\"></a>
								 <a class='btn icon-trash' onclick=\"bootbox.confirm('Do you want to delete this group?', 
								 							function(result){
								 								if(result){deleteRecord('groups',$id);listGroups();}
								 							});\"></a></td>
		</tr>";
		
		$counter ++;
	}
?>