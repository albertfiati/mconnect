<?php
    require_once'../config/requires.inc.php';
	require_once'uploadCSV.php';
	
	//$filePath = isset($_POST['filePath']) ? $_POST['filePath'] : '';

	$output['was_uploaded'] = FALSE;
	if ($_FILES['csv']['error'] == 0) {
		$mime = $_FILES['csv']['type'];
		
		$mimes = array('text/csv', '');
		
		switch($mime) {
			case 'text/csv':
				$ext = '.csv';
				break;
			default:
				$ext = '.csv';
		}
		
		do {
			$raw_name = uniqid();
			$filename = $raw_name . $ext;
			
			if (file_exists('../uploadedFiles/' . $filename) == FALSE) {
				break;
			}
		} while(TRUE);
		
		if (TRUE) {
			if (move_uploaded_file($_FILES['csv']['tmp_name'], '../uploadedFiles/' . $filename)) {
				insertFromFile('../uploadedFiles/'.$filename);
				$output['was_uploaded'] = TRUE;
			} else {
				$output['message'] = 'Could not move file to destination folder';
			}
		} else {
			$output['message'] = 'Mime type is not allowed';
		}
	} else {
		$output['message'] = 'File upload error occurred';
	}
	
	print_r($output);
?>