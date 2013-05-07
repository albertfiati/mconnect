<?php
    class UserAccount{
    		private $orgName;
			private $email;
    		private $username;
			private $password;
			private $uid;
			
			public function __construct($orgName,$email,$username,$password){
				$this->orgName = $orgName;
				$this->email = $email;
				$this->username = $username;
				$this->password = $password;
			}
			
			public function createAccount(){
				try{
					$table = USERACCOUNT;
					
					$salt = self::createSalt();					
					$username = $this->getUsername();
					$password = sha1($this->getPassword().''.$salt);
					$orgName = $this->getOrgName();
					$email = $this->getEmail();
					$uid = $this->getId();
					
					if(!($this->exist())){
						$query = "INSERT INTO $table(orgName,email,username,password,salt,enabled) 
									 VALUES('$orgName','$email','$username','$password','$salt',0)";
						$result = mysql_query($query);
						
						if($result){
							$this->uid = mysql_insert_id();
							return TRUE;
						}else{
							return "Account creation failed";
						}
					}else{
						return 'Username has been seleted by another user';
					}			
				}catch(Exception $ex){
					print $ex;
				}				
			}
			
			public function update($username,$orgName,$email,$id){
				try{
					$table = USERACCOUNT;
					
					$query = "UPDATE $table SET username='$username', password = '$password', orgName='$orgName', email='$email', enabled = '$enabled'
							  WHERE accountid='$id'";
					$result = mysql_query($query);
					
					if($result){
						return TRUE;
					}else{
						return "Record update failed";
					}				
				}catch(Exception $ex){
					print $ex;
				}	
			}

			public static function delete($id){
				try{
					$table = USERACCOUNT;
										
					if ($this->exist()){
						$id = $this->getId();
						$query = "DELETE FROM $table WHERE accountId='$id'";
						$result = mysql_query($query);
						if ($result){
							return TRUE;
						}else{
							return "No record deleted";
						}
					}else{
						return "No such account exists";
					}				
				}catch(Exception $ex){
					print $ex;
				}	
			}
			
			public static function createSalt(){
				$size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
			    $iv = mcrypt_create_iv($size, MCRYPT_DEV_RANDOM);
				$date = new DateTime();			
				$salt = $iv .''. $date->format("ymdYhismm");
				
				return $salt;
			}
			
			public static function getAccountSalt($username){
				$table = USERACCOUNT;
				$result = mysql_query("Select salt from $table where username ='$username'");
				
				while($row=mysql_fetch_assoc($result)){
					return trim($row['salt']);
				}
			}
			
			
			public function getId(){
				return $this->uid;
			}
			
			
			public static function getAId($username,$pswd){
				$password = sha1(trim($pswd).''.self::getAccountSalt($username));
				
				try{
					$table = USERACCOUNT;
					
					$query = "SELECT * FROM $table WHERE username='".strtolower($username)."' and password='".$password."'";
					$result = mysql_query($query);
					
					while($row=mysql_fetch_assoc($result)){
						return $row['accountId'];
					}					
				}catch(Exception $ex){
					print $ex;
				}
			}
			
			public static function validAccount($username,$pswd){
				$password = sha1(trim($pswd).''.self::getAccountSalt($username));
				
				try{
					$table = USERACCOUNT;
					
					$query = "SELECT * FROM $table WHERE username='".strtolower($username)."' and password='".$password."'";
					$result = mysql_query($query);
					
					if(mysql_num_rows($result)==1){
						return TRUE;
					}else{
						return FALSE;
					}	
					
				}catch(Exception $ex){
					print $ex;
				}
			}
			
			public function exist(){
				try{
					$table = USERACCOUNT;
					$username = $this->getUsername();
					
					$query = "SELECT * FROM $table WHERE username='".strtolower($username)."'";
					$result = mysql_num_rows(mysql_query($query));
					
					if ($result>0){
						return TRUE;
					}else{
						return FALSE;
					}
				}catch(Exception $ex){
					print $ex;
				}
			}		
			
			public static function selectAll(){
				try{
					$table = USERACCOUNT;
					$query = "SELECT * FROM $table";
					$result = mysql_query($query);
					return $result;
				}catch(Exception $ex){
					print $ex;
				}
			}
			
			public static function isEnabled($uid){
				$table = USERACCOUNT;
				$query = "Select enabled from $table where accountId =$uid";
				$result = mysql_query($query);
				while($row=mysql_fetch_assoc($result)){
					if($row['enabled']==1){
						return TRUE;
					}else{
						return FALSE;
					}
				}
								
			}
			
			public static function resetPassword($accountId,$oldPassword,$newPassword,$confPassword){
				$table = USERACCOUNT;
				$query = "Select * from $table where accountId=$accountId";
				$result = mysql_query($query);
				
				while($row=mysql_fetch_assoc($result)){
					if(sha1($oldPassword .''.$row['salt'])==$row['password']){						
						if ($newPassword==$confPassword){
							$salt = self::createSalt();
							$password = sha1($newPassword.''.$salt);
							
							$updateQuery = "update $table set password ='$password',salt='$salt' where accountId=$accountId";
							$updateResult = mysql_query($updateQuery);
							
							var_dump($updateResult);
							if ($updateQuery==TRUE){
								return "success";
							}else{
								return "failed";
							}
						}
					}
				}
			}
			
			public static function enable($uid){
				$query = "UPDATE $table SET enabled = 1 WHERE accountId='$id'";
				$result = mysql_query($query);
				
				if($result){
					return TRUE;
				}else{
					return FALSE;
				}	
			}	
						
			public function setOrgName($orgName){
				$this->orgName = $orgName;
			}
			
			public function getOrgName(){
				return $this->orgName;
			}
			
			public function setEmail($email){
				$this->email = $email;
			}
			
			public function getEmail(){
				return $this->email;
			}
			
			public function setUsername($username){
				$this->username = $username;
			}
			
			public function getUsername(){
				return strtolower($this->username);
			}
			
			public function setPassword($password){
				$this->password = $password;
			}
			
			public function getPassword(){
				return $this->password;
			}
			
			public function setSalt($salt){
				$this->salt = $salt;
			}
			
			public function getSalt(){
				return $this->salt;
			}
    }
?>