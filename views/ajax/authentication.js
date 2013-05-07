$(document).ready(function() {
	authInit();
});

function authInit() {
	login();
	signup();
}

function enableBtnSignUp(btn){
	if ($(btn).prop('checked',true)){
		$('input#signupbtn').removeAttr('disabled');
	}else{
		$('input#signupbtn').attr('disabled','disabled');
	}
}

function login() {
	$("form[name='signin']").on("submit", function() {
		var username = $("input[name='logInusername']").val();
		var password = $("input[name='logInpassword']").val();

		var loginJSON = {
			logInusername : username,
			logInpassword : password
		};

		$.post('controllers/signin.php', loginJSON, function(data, status) {
			var me = data;
			
			if(me.trim()=='success'){
				window.location.replace("home.html");
			}else{
				$('#logInError').html("Log In failed: invalid credentials.").fadeIn(500);
				$("input[name='logInpassword']").val("");
			}

			(data.trim() == "success") ? window.location.replace("home.html") : $('#loginError').html(data);
		});

		return false;
	});
}

function checkSession() {
	$.get("controllers/verified.php", function(data) {
		if (data.trim() == "logout") {
			window.location.replace("index.html");
		}
	});

	return false;
}

function logout() {
	$("li[name='logout']").on("click", function() {
		$.get("controllers/logout.php", function() {
			window.location.replace("index.html");
		});
		return false;
	});
}

function signup() {
	$("form[name='signup']").on("submit", function() {
		var orgName = $("input[name='orgName']").val();
		var email = $("input[name='email']").val();
		var username = $("input[name='username']").val();
		var password = $("input[name='password']").val();
		var confPassword = $("input[name='confPassword']").val();

		var accountJSON = {
			username : username,
			password : password,
			confPassword : confPassword,
			orgName : orgName,
			email : email
		};
		
		$.post('controllers/signup.php', accountJSON, function(data, status) {
			var me = data;

			if(me.trim()=="success"){
				window.location.replace("home.html");
			}else{
				$('#signUpError').html(data).fadeIn(500);				
			}
		});

		return false;
	});
}

function passwordReset(){
	var oldPassword = $("input[name='oldPassword']").val();
	var newPassword = $("input[name='newPassword']").val();
	var confirmPassword = $("input[name='confirmPassword']").val();
	
	var passJSON = {oldPassword:oldPassword,
					 newPassword:newPassword,
					 confirmPassword:confirmPassword};
					 
	$.post("controllers/resetPassword.php",passJSON,function(data,status){
		console.log(data);
	});
}

function updateProfile(){
	var username = $("input[name='username']").val();
	var orgname = $("input[name='orgname']").val();
	var email = $("input[name='email']").val();
	
	var profileJSON = {username:username,
					 orgname:orgname,
					 email:email};
					 
	$.post("controllers/profileUpdate.php",profileJSON,function(data,status){
		console.log(data);
	});
}

