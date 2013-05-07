$(document).ready(function() {
	memberInit();
});

function memberInit(){
	addMember();
	listMembers();
}

function addMember() {
	$("form[name='membership']").on("submit", function() {
		var title = $("select[name='title']").val();
		var gender = $("select[name='gender']").val();
		var firstname = $("input[name='firstname']").val();
		var lastname = $("input[name='lastname']").val();
		var middlename = $("input[name='middlename']").val();
		var dob = $("input[name='dob']").val();
		var mobile = $("input[name='mobile']").val();
		var email = $("input[name='email']").val();
		var address = $("input[name='address']").val();
		var dor = $("input[name='dor']").val();
		var doe = $("input[name='doe']").val();
		
		var memberJSON = {
			title : title,
			gender : gender,
			firstname : firstname,
			lastname : lastname,
			middlename : middlename,
			dob : dob,
			mobile : mobile,
			address : address,
			email : email,
			dor : dor,
			doe:doe
		};

		$.post('controllers/addnewmember.php', memberJSON, function(data, status) {
			var me = data;
			if(data.trim() == "success"){
				$('#memberSuccess').html("Member has been successfully added.");
				$('#memberSuccess').fadeIn(500).fadeOut(3000);
				resetMemberForm();
			}else{
				$('#memberError').html("Member was not added.");
				$('#memberError').fadeIn(500).fadeOut(3000);
			}
		});

		return false;
	});
}

function memberUpdate() {
	//$("form[name='updateMember']").on("submit", function() {
		var title = $("select[name='utitle']").val();
		var gender = $("select[name='ugender']").val();
		var firstname = $("input[name='ufirstname']").val();
		var lastname = $("input[name='ulastname']").val();
		var middlename = $("input[name='umiddlename']").val();
		var dob = $("input[name='udob']").val();
		var mobile = $("input[name='umobile']").val();
		var email = $("input[name='uemail']").val();
		var address = $("input[name='uaddress']").val();
		var dor = $("input[name='udor']").val();
		var doe = $("input[name='udoe']").val();
		var mid = $("input[name='memberId']").val();
		
		var memberJSON = {
			title : title,
			gender : gender,
			firstname : firstname,
			lastname : lastname,
			middlename : middlename,
			dob : dob,
			mobile : mobile,
			address : address,
			email : email,
			dor : dor,
			doe : doe,
			mid : mid
		};

		$.post('controllers/updatemember.php', memberJSON, function(data, status) {
			var me = data;
			
			if(data.trim() == "success"){
				$('#memberSuccess').html("Member has been successfully added.");
				$('#memberSuccess').fadeIn(500).fadeOut(3000);
				resetMemberForm();
			}else{
				$('#memberError').html("Member was not added.");
				$('#memberError').fadeIn(500).fadeOut(3000);
			}
		});

		return false;
	//});
}

function resetMemberForm(){
	$("select[name='title']").val("Select");
	$("select[name='gender']").val("Select");
	$("input[name='firstname']").val("");
	$("input[name='lastname']").val("");
	$("input[name='middlename']").val("");
	$("input[name='dob']").val("");
	$("input[name='mobile']").val("");
	$("input[name='email']").val("");
	$("input[name='address']").val("");
	$("input[name='dor']").val("");
	$("input[name='doe']").val("");
}

function listMembers(){	
	
	$.get("controllers/listmembers.php",function(data){		
		$('#memberlist').html(data);	
	 });
	 
	 return false;
}

function listMemberNames(grpId) {
	var json = {grpId:grpId};
	
	$.post("controllers/listMemberNames.php",json, function(data) {
		$('#memberNameList').html(data);
	});

	return false;
}


