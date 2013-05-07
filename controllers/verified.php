<?php
	session_start();
	
    if (!(isset($_SESSION['id']))){
    	print "logout";
   }
?>