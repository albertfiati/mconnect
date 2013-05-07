function mygo(){
	hideAllTabContent();
	$("#tab0content").show();
	memHideAllTabContent();
	$("#memtab1content").show();
	serHideAllTabContent();
	$("#sertab1content").show();
	grpHideAllTabContent();
	$("#grptab1content").show();
	mesHideAllTabContent();
	$("#mestab1content").show();
	stfHideAllTabContent();
	$("#stftab1content").show();
	subHideAllTabContent();
	$("#subtab1content").show();
	payHideAllTabContent();
	$("#paytab1content").show();
	// hideAllMesDivContent();
	// $("#composeEmail_").show();
}

function noActiveTab(){
	$("#tab0").attr("class","");
	$("#tab1").attr("class","");
	$("#tab2").attr("class","");
	$("#tab3").attr("class","");
	$("#tab4").attr("class","");
	$("#tab5").attr("class","");
	$("#tab6").attr("class","");
	$("#tab7").attr("class","");
}

function memNoActiveTab(){
	$("#memTab1").attr("class","memtab");
	$("#memTab2").attr("class","memtab");
	$("#memTab3").attr("class","memtab");
}

function serNoActiveTab(){
	$("#serTab1").attr("class","sertab");
	$("#serTab2").attr("class","sertab");
	$("#serTab3").attr("class","sertab");
}

function grpNoActiveTab(){
	$("#grpTab1").attr("class","grptab");
	$("#grpTab2").attr("class","grptab");
	$("#grpTab3").attr("class","grptab");
}

function mesNoActiveTab(){
	$("#mesTab1").attr("class","mestab");
	$("#mesTab2").attr("class","mestab");
	$("#mesTab3").attr("class","mestab");
	$("#mesTab4").attr("class","mestab");
	$("#mesTab5").attr("class","mestab");
	$("#mesTab6").attr("class","mestab");
}

function stfNoActiveTab(){
	$("#stfTab1").attr("class","stftab");
	$("#stfTab2").attr("class","stftab");
	$("#stfTab3").attr("class","stftab");
}

function subNoActiveTab(){
	$("#subTab1").attr("class","subtab");
	$("#subTab2").attr("class","subtab");
	$("#subTab3").attr("class","subtab");
	$("#subTab4").attr("class","subtab");
}

function payNoActiveTab(){
	$("#payTab1").attr("class","paytab");
	$("#payTab2").attr("class","paytab");
	$("#payTab3").attr("class","paytab");
}

// function noActiveMessageTab(){
	// $("#tabmailcompose").attr("class","");
	// $("#tabmailsent").attr("class","");
	// $("#tabmaildraft").attr("class","");
	// $("#tabsmscompose").attr("class","");
	// $("#tabsmssent").attr("class","");
	// $("#tabsmsscheduled").attr("class","");
// }

function hideAllTabContent(){
	$(".tabContent").hide();
}

function memHideAllTabContent(){
	$(".memtabContent").hide();
}

function serHideAllTabContent(){
	$(".sertabContent").hide();
}

function grpHideAllTabContent(){
	$(".grptabContent").hide();
}

function mesHideAllTabContent(){
	$(".mestabContent").hide();
}

function stfHideAllTabContent(){
	$(".stftabContent").hide();
}

function subHideAllTabContent(){
	$(".subtabContent").hide();
}

function payHideAllTabContent(){
	$(".paytabContent").hide();
}

// function hideAllMesDivContent(){
	// $(".mesDivContent").hide();
// }

function tabclick(tab){
	noActiveTab();
	$("#tab"+tab).attr("class","active");
	hideAllTabContent();
	$("#tab"+tab+"content").show();
}

function memtabclick(memtab){
	memNoActiveTab();
	$("#memTab"+memtab).attr("class","memtab active");
	memHideAllTabContent();
	$("#memtab"+memtab+"content").show();
}

function sertabclick(sertab){
	serNoActiveTab();
	$("#serTab"+sertab).attr("class","sertab active");
	serHideAllTabContent();
	$("#sertab"+sertab+"content").show();
}

function grptabclick(grptab){
	grpNoActiveTab();
	$("#grpTab"+grptab).attr("class","grptab active");
	grpHideAllTabContent();
	$("#grptab"+grptab+"content").show();
}

function mestabclick(mestab){
	mesNoActiveTab();
	$("#mestabcontent_").show();
	$("#mesTab"+mestab).attr("class","mestab active");
	mesHideAllTabContent();
	$("#mestabcontent_").show();
	$("#mestab"+mestab+"content").show();
}

function stftabclick(stftab){
	stfNoActiveTab();
	$("#stfTab"+stftab).attr("class","stftab active");
	stfHideAllTabContent();
	$("#stftab"+stftab+"content").show();
}

function subtabclick(subtab){
	subNoActiveTab();
	$("#subTab"+subtab).attr("class","subtab active");
	subHideAllTabContent();
	$("#subtab"+subtab+"content").show();
}

function paytabclick(paytab){
	payNoActiveTab();
	$("#payTab"+paytab).attr("class","paytab active");
	payHideAllTabContent();
	$("#paytab"+paytab+"content").show();
}

// function mesComposeTabClick(composeTab){
	// noActiveMessageTab();
	// $("#"+composeTab).attr("class","active");
	// hideAllMesDivContent();
	// $("#"+composeTab+"_").show();
// }


function toggleAdminButton(){
	if($("#adminButton").attr("class")=="btn-group pull-right"){
		$("#adminButton").attr("class","btn-group open pull-right");
	}
	else {
		$("#adminButton").attr("class","btn-group pull-right")
	}
}

function md(){}


function editMember(title,fname, mname, lname, gender, dob, mobile, email, address,id){
	$('.modal-body').html("<div style='margin-left:50px;'><h3>Edit "+ fname +"</h3>"
			+"<div class='alert alert-success errorDiv' id='memberSuccess'></div>"
			+"<div class='alert alert-error errorDiv' id='memberError'></div>"

			+"<form class='' name='updateMember' method='post'>"
				+"<input type='hidden' id='memberId'  name='memberId' value='"+ id +"'>"
				
				+"<div class='control-group input-prepend'>"
					+"<span class='add-on' style='width: 80px;'>Title</span>"
					+"<select name='utitle' class='input-xlarge wid347' style='width: 300px;'value='"+ title +"'>"
						+"<option>Select</option>"
						+"<option>Mr.</option>"
						+"<option>Miss.</option>"
						+"<option>Mrs.</option>"
						+"<option>Dr.</option>"
						+"<option>Prof.</option>"
					+"</select>"
				+"</div>"

				
				+"<div class='control-group input-prepend'>"
					+"<span class='add-on' style='width: 80px;'>Firstname</span>"
					+"<input name='ufirstname' type='text' placeholder='e.g. John' class='input-xlarge wid347 span4' value='"+ fname +"'>"
				+"</div>"

				
				+"<div class='control-group input-prepend'>"
					+"<span class='add-on' style='width: 80px;'>Middle Name</span>"
					+"<input name='umiddlename' type='text' placeholder='e.g. Korblah' class='input-xlarge wid347 span4' value='"+ mname +"'>"
				+"</div>"
								
				+"<div class='control-group input-prepend'>"
					+"<span class='add-on' style='width: 80px;'>Lastname</span>"
					+"<input name='ulastname' type='text' placeholder='e.g. Fiati-Kumasenu' class='input-xlarge wid347 span4' value='"+ lname +"'>"
				+"</div>"
				
				+"<div class='control-group input-prepend'>"
					+"<span class='add-on' style='width: 80px;'>Gender</span>"
					+"<select name='ugender' class='input-xlarge wid347' style='width: 300px;'>"
						+"<option>Select</option>"
						+"<option>Male</option>"
						+"<option>Female</option>"
					+"</select>"
				+"</div>"
				
				+"<div class='control-group input-prepend'>"
					+"<span class='add-on' style='width: 80px;'>Date of Birth</span>"
					+"<input name='udob' type='date' placeholder='' class='input-xlarge wid347 span4' value='"+ dob +"'>"
				+"</div>"
				
				+"<div class='control-group input-prepend'>"
					+"<span class='add-on' style='width: 80px;'>Mobile</span>"
					+"<input name='umobile' type='text' placeholder='e.g. 0265487956' class='input-xlarge wid347 span4' value='"+ mobile +"'>"
				+"</div>"
				
				+"<div class='control-group input-prepend'>"
					+"<span class='add-on' style='width: 80px;'>Email</span>"
					+"<input name='uemail' type='text' placeholder='e.g. username@mail.com' class='input-xlarge wid347 span4' value='"+ email +"'>"
				+"</div>"
				
				+"<div class='control-group input-prepend'>"
					+"<span class='add-on' style='width: 80px;'>Address</span>"
					+"<input name='uaddress' type='text' placeholder='e.g. No. 12 Oluklotey Road, Kaneshie - Accra' class='input-xlarge wid347 span4' value='"+ address +"'>"
				+"</div>"
				
				+"<div class='control-group input-prepend'>"
					+"<span class='add-on' style='width: 80px;'>Reg. Date</span>"
					+"<input name='udor' type='date' placeholder='' class='input-xlarge wid347 span4'>"
				+"</div>"
				
				+"<div class='control-group input-prepend'>"
					+"<span class='add-on' style='width: 80px;'>Exp. Date</span>"
					+"<input name='udoe' type='date' placeholder='' class='input-xlarge wid347 span4'>"
				+"</div>"
			+"</form>"		
		+"</div>");
}

function sendMessage(fname,mobile, email){
	$('.modal-body').html("<div style='margin:0px auto; margin-left:8px;'><h3>Contact "+ fname + "</h3>"
			+"<form class='form-horizontal' name='composeEmail' method='post'>"
				+"<input type='hidden' name='fname' value='"+fname+"'>"
				+"<input type='hidden' name='telephone' value='"+mobile+"'>"
				+"<input type='hidden' name='emailadd' value='"+email+"'>"
				
					+"<div class='control-group input-prepend form-inline' style='text-align:center;'>"
						+"<label class='radio'>" 
						   +"<input type='radio' value='Email' name='msgType'><i class='icon-envelope'></i><pan> Email</span>" 
						+"</label>" 
						+"<label class='radio' style='margin-left:40px'>" 
						   +"<input type='radio' value='SMS'  name='msgType'><i class='icon-phone'></i><pan> SMS</span>" 
						+"</label>" 
					+"</div>"

					+"<div class='control-group input-prepend'>"
						+"<span class='add-on' style='width: 80px;'>Subject</span>"
						+"<input type='text' name= 'subject' placeholder='enter message subject' style='width: 410px;'>"
					+"</div>"
					
					+"<div class='control-group input-prepend'>"
						+"<span class='add-on' style='width: 80px;'>Salutation</span>"
						+"<input type='text' name= 'salutation' value='Hi' style='width: 410px;'>"
					+"</div>"

					+"<div class='control-group'>"
						+"<textarea class='input-xlarge' id='textarea' rows='6' style='width:499px;' name='message'></textarea>"
					+"</div>"
			+"</form>"
		+"</div>");
}

function resetPassword(){
	$('.modal-body').html("<div style='margin:0px auto; margin-left:8px;'><h3>Reset Password</h3>"
			+"<form class='form-horizontal' name='composeEmail' method='post'>"
				+"<div class='alert alert-success msgerrorDiv' id='emailSuccess'></div>"
				+"<div class='alert alert-error msgerrorDiv' id='emailError'></div>"
									
					+"<div class='control-group input-prepend'>"
						+"<span class='add-on' style='width: 155px;'><i class='icon-key'> Old Password</span>"
						+"<input type='password' name= 'oldPassword' style='width: 337px;'>"
					+"</div>"
					
					+"<div class='control-group input-prepend'>"
						+"<span class='add-on' style='width: 155px;'><i class='icon-key'> New Password</span>"
						+"<input type='password' name= 'newPassword' style='width: 337px;'>"
					+"</div>"
					
					+"<div class='control-group input-prepend'>"
						+"<span class='add-on' style='width: 155px;'><i class='icon-key'></i> Re-type New Password</span>"
						+"<input type='password' name= 'confirmPassword' style='width: 337px;'>"
					+"</div>"
			+"</form>"
		+"</div>");
}

function listMemNames(grpId){
		$('.modal-body').html("<h3>Add Members to Group</h3><form name=\"joinGroup\"  method=\"post\"><div class='row' id='memberNameList'><h3>Select Members</h3></div>"
	+"<input type='hidden' value='" + grpId + "' name='groupId'><div class='span6'></div></form>");
		
		listMemberNames(grpId);
}

function uploadCSV(){
	$('.modal-body').html("<div style='margin:0px auto; margin-left:8px;'><h3>Upload CSV File</h3>"
			+"<form class='form-horizontal' name='uploadCSV' id='csv_form' method='post' enctype='multipart/form-data' onsubmit='return submit_csv_form(this);'>"
				+"<div class='alert alert-success msgerrorDiv' id='emailSuccess'></div>"
				+"<div class='alert alert-error msgerrorDiv' id='emailError'></div>"
				
					+"<div class='control-group input-prepend'>"
						+"<h4>Please ensure the csv files has this order :</h4>"
							+"<h6>title, firstname, middle/other names, lastname, gender, date of birth, telephone, email, </br>address, date of registration,date of expiry, group</h6>"
					+"</div>"
					
					+"<div class='control-group input-prepend'>"
						+"<input type='file' name= 'csv' style='width: 337px;'>"
					+"</div>"
			+"</form>"
		+"</div>");
}

function editGroup(id,type,description){
	$('.modal-body').html("<div style='margin:0px auto; margin-left:8px;'><h3>Edit Group</h3>"
			+"<form name='updategroups' method='post'>"
				+"<div class='span6'>"
					+"<div class='control-group'>"
						+"<input name='groupId' type='hidden' placeholder='' class='input-xlarge wid347' style='width: 243px' value='"+ id +"'>"
					+"</div>"
				+"</div>"
				
				+"<div class='span6'>"
					+"<div class='control-group input-prepend'>"
						+"<span class='add-on' style='width: 120px;'>Group Name</span>"
						+"<input name='utype' type='text' placeholder='' class='input-xlarge wid347' style='width: 243px' value='"+ type +"'>"
					+"</div>"
				+"</div>"

				+"<div class='span6'>"
					+"<div class='control-group'>"
						+"<label class='control-label'>Description: </label>"
						+"<div class='controls'>"
							+"<textarea class='span5' rows='5' name='udescription' style='width:375px;'>"+ description +"</textarea>"									
						+"</div>"
					+"</div>"
				+"</div>"

			+"</form>"
		+"</div>");
}

function myAccount(){
	$('.modal-body').html("<div style='margin:0px auto; margin-left:8px;'><h3>Edit Profile</h3><form name ='updateProfile' name='signup' method='post'>" 
		+"<div class='control-group input-prepend'>" 
			+"<span class='add-on' style='width: 135px;'>Name of Organization</span>" 
			+"<input type='text' name='orgname' class='signUpformField'>" 
		+"</div>" 

		+"<div class='control-group input-prepend'>" 
			+"<span class='add-on' style='width: 135px;'>Email Address</span>" 
			+"<input type='email' name='email' class='signUpformField'>" 
		+"</div>" 

		+"<div class='control-group input-prepend'>" 
			+"<span class='add-on' style='width: 135px;'>Usename</span>" 
			+"<input type='text' name='username' class='signUpformField'>" 
		+"</div>" 
	+"</form></div>");
}
