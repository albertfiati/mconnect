function vemail(txt){
	var emailregex = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
	return (emailregex.test(txt))?true:false;
}

function vname(txt){
	var nameregex = /^[a-zA-ZàáâäãåaceèéêëìíîïlnòóôöõøùúûüÿýzzñçcšžÀÁÂÄÃÅACEÈÉÊËÌÍÎÏLNÒÓÔÖÕØÙÚÛÜŸÝZZÑßÇŒÆCŠŽ?ð ,.'-]+$/;
	return (nameregex.test(txt))?true:false;
}

function vuname(txt){
	var nameregex = /^[a-zA-Z0-9àáâäãåaceèéêëìíîïlnòóôöõøùúûüÿýzzñçcšžÀÁÂÄÃÅACEÈÉÊËÌÍÎÏLNÒÓÔÖÕØÙÚÛÜŸÝZZÑßÇŒÆCŠŽ?ð,.'-]+$/;
	return (nameregex.test(txt))?true:false;
}

function vphnumber(txt){
	var pnumberregex = /(^0\d{9}$)|(^\+\d{12,13}$)/;
	return (pnumberregex.test(txt))?true:false;
}

function vdecnumber(txt){
	var numberregex = /(^\d+$)|(\d+\.\d+)/;
	return (numberregex.test(txt))?true:false;
}

function vintnumber(txt){
	var numberregex = /^\d+$/;
	return (numberregex.test(txt))?true:false;
}

function validate(id,typ,req){
	var txt = document.getElementById(id).value;
	var output='';
	
	console.log('id: ' + id);
	
	switch(typ){
	case 1: 
		output = vemail(txt);
		break;
	case 2: 
		output = vname(txt);
		break; 
	case 3:
		output = vphnumber(txt);
		break;
	case 4:
		output = vdecnumber(txt);
		break;
	case 5:
		output = vintnumber(txt);
		break;
	case 6: 
		output = vuname(txt);
		break;
	}
	
	console.log('output: ' + output);
	
	if (output == true){
		document.getElementById(id).style.borderColor = '#4186D3';
	}else{
		document.getElementById(id).style.borderColor = '#f00';
		document.getElementById(id).focus();
	}
}