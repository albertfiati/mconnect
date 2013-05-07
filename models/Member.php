<?php
	class Member{
		private $title;
		private $firstname;
		private $lastname;
		private $otherNames;
		private $gender;
		private $dateOfBirth;
		private $email;
		private $telephone;
		private $address;
		private $userAccountId;
		private $dor;
		private $expDate;
		private $id;
		
		public function __construct($title,$fname,$lname,$onames,$gender,$dob,$email,$telephone,$address,$dor,$doe,$uId){
			$this->title = $title;
			$this->firstname = $fname;
			$this->lastname = $lname;
			$this->otherNames = $onames;
			$this->gender = $gender;
			$this->dateOfBirth = $dob;
			$this->email = $email;
			$this->telephone = $telephone;
			$this->address = $address;
			$this->dor = $dor;
			$this->expDate = $doe;
			$this->userAccountId = $uId;			
		}
		
		public function addMember(){
			try{
				$table = MEMBER;
				$title= $this->getTitle();
				$firstname = $this->getFirstname();
				$lastname = $this->getlastname();
				$othernames = $this->getOtherNames();
				$gender = $this->getGender();
				$DOB = $this->getDOB();
				$email = $this->getEmail();
				$tel = $this->getTelephone();
				$address = $this->getAddress();
				$dor = $this->getDateOfRegistration();
				$doe = $this->getDateOfExpiry();
				$uId = $this->getUserId();
				
				if (!($this->exist())){
					$query = "INSERT INTO $table(title,firstname,lastname,othernames,gender,dob,email,telephone,dateofreg,expdate,address,uId) 
							  VALUES('$title','$firstname','$lastname','$othernames','$gender','$DOB','$email','$tel','$dor','$doe','$address','$uId')";
					$result = mysql_query($query);
					if($result){
						$this->id = mysql_insert_id();
						return TRUE;
					}else{
						return FALSE;
					}
				}else{
					return "Duplicate MEMBER";
				}				
			}catch(Exception $ex){
				print $ex;
			}				
		}
		
		public function exist(){
			try{
				$table = MEMBER;
				$title= $this->getTitle();
				$firstname = $this->getFirstname();
				$lastname = $this->getlastname();
				$othernames = $this->getOtherNames();
				$gender = $this->getGender();
				$DOB = $this->getDOB();
				$email = $this->getEmail();
				$address = $this->getAddress();
				$tel = $this->getTelephone();
				
				$uId = $this->getUserId();
				
				$query = "SELECT * FROM $table WHERE firstname='$firstname' and lastname='$lastname' and 
						  othernames='$othernames' and email='$email' and telephone='$tel' and uId='$uId'";
				$result = mysql_num_rows(mysql_query($query));
				
				if ($result>0){
					return TRUE;
				}
			}catch(Exception $ex){
				print $ex;
			}
		}
		
		public static function delete($id){
			try{
				$table = MEMBER;
									
				$query = "DELETE FROM $table WHERE memberId=$id";
				$result = mysql_query($query);
				
				if($result==1){
					return TRUE;
				}else{
					return "Delete failed";
				}				
			}catch(Exception $ex){
				print $ex;
			}	
		}
		
		public static function update($title,$firstname,$lastname,$othernames,$gender,$DOB,$email,$tel,$address,$dor,$doe,$mid){
			try{
				$table = MEMBER;
				
				$query = "UPDATE $table SET title='$title', firstname='$firstname', lastname='$lastname', 
						  othernames='$othernames', gender='$gender', dob='$DOB', email='$email', telephone='$tel', 
						  address='$address', dateofreg='$dor', expdate='$doe' WHERE memberId=$mid";
				$result = mysql_query($query);
				
				if ($result){
					return TRUE;
				}else{
					return FALSE;
				}				
			}catch(Exception $ex){
				print $ex;
			}	
		}
		
		public static function selectAll($uid){
			try{
				$table = MEMBER;
				$query = "select * from $table where uId=$uid";
				
				return mysql_query($query);
			}catch(Exception $ex){
				print $ex;
			}
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setTitle($title){
			$this->title = $title;
		}
		
		public function getTitle(){
			return $this->title;
		}
		
		public function setFirstname($fname){
			$this->firstname = $fname;
		}
		
		public function getFirstname(){
			return $this->firstname;
		}
		
		public function setLastname($lname){
			$this->lastname = $lname;
		}
		
		public function getLastname(){
			return $this->lastname;
		}
		
		public function setOtherNames($onames){
			$this->otherNames = $onames;
		}
		
		public function getOtherNames(){
			return $this->otherNames;
		}
		
		public function setDOB($dob){
			$this->dateOfBirth = $dob;
		}
		
		public function getDOB(){
			return $this->dateOfBirth;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setGender($gender){
			$this->gender = $gender;
		}
		
		public function getGender(){
			return $this->gender;
		}
		
		public function setTelephone($tel){
			$this->telephone= $tel;
		}
		
		public function getTelephone(){
			return $this->telephone;
		}
		
		public function setUserId($uId){
			$this->userAccountId= $uId;
		}
		
		public function getUserId(){
			return $this->userAccountId;
		}
		
		public function setAddress($address){
			$this->address = $address;
		}
		
		public function getAddress(){
			return $this->address;
		}
		
		public function setDateOfRegistration($dor){
			$this->dor = $dor;
		}
		
		public function getDateOfRegistration(){
			return $this->dor;
		}
		
		public function setDateOfExpiry($doe){
			$this->expDate = $doe;
		}
		
		public function getDateOfExpiry(){
			return $this->expDate;
		}
	
}
?>