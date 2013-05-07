$(document).ready(function(){
	messageInit();
})

function messageInit(){
	sendEmail();
	sendSMS();
}

function sendEmail(){
	$("form[name='composeEmail']").on("submit", function() {
		var subject = $("input[name='emailSubject']").val();
		var message = $("textarea[name='emailMessage']").val();
		var salutation = $("input[name='emailSalutation']").val();
		var recipient = $("select[name='emailRecipients']").val();		

		var emailJSON = {
			subject : subject,
			message : message,
			recipient : recipient,
			salutation:salutation
		};
		
		$.post('controllers/sendEmail.php', emailJSON, function(data, status) {
			var me = data;
			if(data.trim() == "success"){
				$('#emailSuccess').html("Email has been successfully added.");
				$('#emailSuccess').fadeIn(500).fadeOut(3000);
				resetEmailForm();
			}else{
				$('#emailError').html("Email not added.");
				$('#emailError').fadeIn(500).fadeOut(3000)
			}
		});
		
		resetEmailForm();
		return false;
	});
}

function resetEmailForm(){
	$("input[name='emailSubject']").val();
	$("textarea[name='emailMessage']").val();
	$("select[name='emailRecipients']").val();	
}

function sendSMS(){		
	$("form[name='composeSMS']").on("submit", function() {
		var subject = $("input[name='SMSSubject']").val();
		var salutation = $("input[name='SMSSalutation']").val();
		var message = $("textarea[name='SMSMessage']").val();
		var recipient = $("select[name='SMSRecipients']").val();		
				
		var SMSJSON = {
			subject : subject,
			salutation : salutation,
			message : message,
			recipient : recipient
		};
		
		$.post('controllers/sendSMS.php', SMSJSON, function(data, status) {
			var me = data;
			console.log(data);
			if(data.trim() == "success"){
				$('#smsSuccess').html("SMS has been successfully added.");
				$('#smsSuccess').fadeIn(500);//.fadeOut(3000);
				resetSMSForm();
			}else{
				$('#smsError').html(data);
				$('#smsError').fadeIn(500);//.fadeOut(3000);
			}
		});

		return false;
	});
}

function sendIndividualMessage(){
	var msgType = $('input[type="radio"]:checked').val();		
	var subject = $("input[name='subject']").val();
	var salutation = $("input[name='salutation']").val();
	var message = $("textarea[name='message']").val();
	var firstname = $("input[name='fname']").val();
	var telephone = $("input[name='telephone']").val();		
	var email = $("input[name='emailadd']").val();		
	
	var msgJSON = {
		subject : subject,
		salutation : salutation,
		message : message,
		firstname:firstname,
		telephone : telephone,
		email:email
	};
	
	if (msgType =='SMS'){
		$.post('controllers/individualSMS.php', msgJSON, function(data, status) {
			var me = data;
			console.log(data);
		});
	}else if(msgType=='Email'){
		$.post('controllers/individualEmail.php', msgJSON, function(data, status) {
			var me = data;
			console.log(data);
		});
	}

	return false;
}

function resetSMSForm(){
	$("input[name='SMSSubject']").val();
	$("textarea[name='SMSMessage']").val();
	$("select[name='SMSRecipients']").val();
}
