$(document).ready(function(){
	init();
	hideOpenedForm();
});


function init(){
	$("div[name='signinDiv']").hide();
	$("div[name='signupDiv']").hide();
}

function signIn(){
	$("div[name='signupDiv']").fadeOut();
	$("div[name='signinDiv']").fadeToggle();
	$("div[name='btnSignUp']").show();
	$("div[name='btnSignUpIn']").hide();
	$("input[name='logInusername']").focus();
}

function signUp(){
	$("div[name='signinDiv']").slideUp();
	$("div[name='signupDiv']").fadeToggle();
	$("input[name='orgName']").focus();
}

function hideOpenedForm(){
	$(document).keyup(function(e){
		if(e.keyCode==27){
			init();	
		}
	});
	
	$('.myspace').click(function(){
		init();	
	});
}
