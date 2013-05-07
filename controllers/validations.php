<?php
	session_start();

	//if (isset($_POST['submit']))
	function user_info_validate(){
		$error = array();
		//username validating
		/*checking if nothing is entered in username*/
		if (empty($_POST['username'])) {
			$error[] = 'Please enter a username.';
			 
		}/*checking to see username name with only letters and numbers*/
		elseif (ctype_alnum($_POST['username'])) {
			$username = $_POST['username'];
		}else{
	         $error[] = 'Username must consist of letters and numbers only.';
		}
	
		//email validation
	    if(empty($_POST['email']))
	    {
	        $error[] = 'Please enter your email. ';
	    }
	    else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
			$email = mysql_real_escape_string($_POST['email']);
	    }else
	    {
			$error[] = 'The Email is not a valid one ';
	    }
	
	    //validating password
	    if (empty($_POST['password'])) {
	    	 $error[] = 'Please enter a valid password...';
	    }
	    elseif (strlen($_POST['password'])< 5) 
	    {
	        $error[] = 'Password Should atleast be <b>5</b> characters for security reasons';
	    }
	    else
	    {
	        $password = mysql_real_escape_string($_POST['password']);
	    }
	
	  }
	
	
	   
	   //validating phone number
	  //number is the name of the field that takes the phnone number
	  function phone_number_validate()
	  {
	        $error = array();
	
	        if (empty($_POST['number'])) 
	        {
	         $error [] = 'Please number must be specified';
	        }
	        elseif (!is_numeric($_POST['number'])) 
	        {
	            $error [] = 'Please it must be numeric';
	        }
	        elseif(preg_match("/^([1]-)?[0-9]{3}-[0-9]{3}-[0-9]{4}$/i", $_POST['number'])){
	            $number = $_POST['number'];
	        }
	
	 }
 
?>