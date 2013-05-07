$(document).ready(function() {
	ininGroupListing();
});

function ininGroupListing() {
	listGroupHeadings();
}

function addToGroup(){
	//$("form[name='joinGroup']").on("submit", function() {
		var grpId= $("input[name='groupId']").val();
		var memberids = new Array();
		
		$("input:checked").each(function() {
		   memberids.push($(this).val());
		});
			
		var grpMemberJSON = {
							grpId : grpId,
							memberids : memberids};

		$.post('controllers/addMemberToGroup.php', grpMemberJSON, function(data, status) {
			var me = data;
			
			// if(data.trim() == "success"){
				// $('#memberSuccess').html("Member has been successfully added.");
				// $('#memberSuccess').fadeIn(500).fadeOut(3000);
				// resetMemberForm();
			// }else{
				// $('#memberError').html("Member was not added.");
				// $('#memberError').fadeIn(500).fadeOut(3000);
			// }
		});

		return false;
	//});
}

function listGroupHeadings() {
	$.get("controllers/listgroups.php", function(data) {
		$(data).appendTo('select#groupHeadings');
	});

	return false;
}

function filterGroupTable() {
	var subId = $('select#groupHeadings').val();
	
	if (subId!='all') {
		var groupJSON = {
			subId : subId
		};

		$.post("controllers/fillGroupTable.php", groupJSON, function(data, status) {
			var me = data;
			$('#memberlist').html(data);
		});
	}

	return false;
}
