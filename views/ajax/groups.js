$(document).ready(function(){
	groupInit();
})

function groupInit(){
	addGroup();
	loadGroup();
	listGroups();
}

function addGroup() {
	$("form[name='groups']").on("submit", function() {

		var type = $("input[name='type']").val();
		var description = $("textarea[name='description']").val();

		var groupJSON = {
			type : type,
			description : description
		};
		
		$.post('controllers/addgroup.php', groupJSON, function(data, status) {
			var me = data;
			
			if(data.trim() == "success"){
				$('#groupSuccess').html("Group has been successfully added.");
				$('#groupSuccess').fadeIn(500).fadeOut(3000);
				resetGroupForm();
			}else{
				$('#groupError').html("group not added.");
				$('#groupError').fadeIn(500).fadeOut(3000)
			}
		});

		return false;
	});
}

function resetGroupForm(){
	$("input[name='type']").val("");
	$("textarea[name='description']").val("");
}

function loadGroup() {
	$.get("controllers/loadgroup.php", function(data) {
		$(data).appendTo('#groupType');
		$("<option value='All'>All Members</option>" + data).appendTo('#emailRecipients');
		$("<option value='All'>All Members</option>" + data).appendTo('#SMSRecipients');
	});

	return false;
}

function listGroups() {
	$.get("controllers/listgroups.php", function(data) {
		$('#grouplist').html(data);
	});

	return false;
}

function groupUpdate(){
	var grpId = $("input[name='groupId']").val();
	var type = $("input[name='utype']").val();
	var description = $("textarea[name='udescription']").val();
	
	var grpJSON = {grpId:grpId,
					type:type,
				    description:description};
	
	$.post('controllers/updategroup.php',grpJSON,function(data,status){
		var me = data
		// if(data.trim() == "success"){
			// $('#groupSuccess').html("Group has been successfully added.");
			// $('#groupSuccess').fadeIn(500).fadeOut(3000);
			// resetGroupForm();
		// }else{
			// $('#groupError').html("group not added.");
			// $('#groupError').fadeIn(500).fadeOut(3000)
		// }
	});		    
}