<?php
	session_start();
	function insertFromFile($filePath) {
		if (getFileExtension($filePath) == '.csv') {
			if (is_file($filePath)) {
				$csv = fopen($filePath, 'r');
		
				$counter = 0;
	
				if (isset($_SESSION['id'])) {
	
					$uId = $_SESSION['id'];
	
					if ($csv) {
						fgets($csv);
	
						while (!feof($csv)) {
							$lineArray = fgetcsv($csv);
	
							$title = $lineArray[0];
							$firstname = $lineArray[1];
							$middlename = $lineArray[2];
							$lastname = $lineArray[3];
							$gender = $lineArray[4];
							$dob = $lineArray[5];
							$telephone = $lineArray[6];
							$email = $lineArray[7];
							$address = $lineArray[8];
							$dor = $lineArray[9];
							$doe = $lineArray[9];
							
							//$title,$fname,$lname,$onames,$gender,$dob,$email,$telephone,$address,$dor,$doe,$uId
	
							if($title==""){
								continue;
							}else{
								$member = new Member($title, $firstname, $lastname, $middlename, $gender, $dob, $email, $telephone, $address,$dor,$doe,$uId);
								$addMember = $member -> addMember();
							}
	
							// if ($addMember == 1) {
								// $pId = $person -> getId();
								// $member = new Member($pId, $dor);
								// $addMember = $member -> addMember();
// 	
								// if ($addMember == 1) {
									 $counter++;
								// }
							// }
						}
	
						print '</br>' . $counter;
						fclose($csv);
					} else {
						print 'File cannot be opened';
					}
				}else{
					return 'You dont have the permission to upload csv files';
				}
			} else {
				return 'Invalid file. File does not exist';
			}
		} else {
			print 'Invalid file. File should be a csv file';
		}
	}
	
	function getFileExtension($filepath) {
		return substr($filepath, strlen($filepath) - 4);
	}
?>