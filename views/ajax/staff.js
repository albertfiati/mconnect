$(document).ready(function(){
	staffInit();
})
function staffInit(){
	addStaff();
	listStaff();
}

function addStaff() {
	$("form[name='staff']").on("submit", function() {
		var title = $("select[name='staffTitle']").val();
		var gender = $("select[name='staffGender']").val();
		var firstname = $("input[name='staffFirstname']").val();
		var lastname = $("input[name='staffLastname']").val();
		var middlename = $("input[name='staffMiddlename']").val();
		var dob = $("input[name='staffDob']").val();
		var mobile = $("input[name='staffMobile']").val();
		var email = $("input[name='staffEmail']").val();
		var address = $("input[name='staffAddress']").val();
		var dor = $("input[name='staffDor']").val();

		var staffJSON = {
			staffTitle : title,
			staffGender : gender,
			staffFirstname : firstname,
			staffLastname : lastname,
			staffMiddlename : middlename,
			staffDob : dob,
			staffMobile : mobile,
			staffAddress : address,
			staffEmail : email,
			staffDor : dor
		};

		$.post('controllers/addstaff.php', staffJSON, function(data, status) {
			var me = data;
			if(data.trim() == "success"){
				$('#staffSuccess').html("Staff has been successfully added.");
				$('#staffSuccess').fadeIn(500).fadeOut(3000);
				resetForm();
			}else{
				$('#staffError').html("Staff not added.");
				$('#staffError').fadeIn(500).fadeOut(3000)
			}
		});

		return false;
	});
}

function resetForm(){
	$("select[name='staffTitle']").val("");
	$("select[name='staffGender']").val("");
	$("input[name='staffFirstname']").val("");
	$("input[name='staffLastname']").val("");
	$("input[name='staffMiddlename']").val("");
	$("input[name='staffDob']").val("");
	$("input[name='staffMobile']").val("");
	$("input[name='staffEmail']").val("");
	$("input[name='staffAddress']").val("");
	$("input[name='staffDor']").val("");
}

function listStaff() {
	$.get("controllers/liststaff.php", function(data) {
		$('#stafflist').html(data);
	});

	return false;
}