$(document).ready(function(){
	
});

function submit_csv_form(form) {
	// console.log('Submitting form');
	jQuery(form).ajaxSubmit({
		url:'controllers/uploadFile.php',
		dataType:'html',
		type:'post',
		success:function(data){
			//console.log(data)
		},
		error:function(){
			//console.log('errorMsg');
		},
		complete: function(xhr, status) {
			//console.log('CSV form completed. Status: ' + status);
		}
	});
	
	return false;
}
