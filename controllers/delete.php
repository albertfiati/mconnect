<?php
	session_start();
	require_once'../config/requires.inc.php';

    $table = $_POST['table'];
	$id = $_POST['id'];
	
 	deleteRecord($table, $id);
    
    function deleteRecord($table,$id){
    	if($table=='member'){
    		Print Member::delete($id);
    	}elseif($table=='groups'){
    		Print Groups::delete($id);
    	}elseif($table=='payment'){
    		Print Payment::delete($id);
    	}elseif($table=='message'){
    		Print MEssages::delete($id);
    	}
    }
?>