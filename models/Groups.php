<?php
    class Groups{    	
    	private $type;
		private $description;
		private $userAccountId;
		
		public function __construct($type,$description,$uId){
			$this->type = $type;
			$this->description = $description;
			$this->userAccountId = $uId;
		}
		
		public function createGroup(){
			try{
				$table = GROUPS;
				$type = $this->getType();
				$description = $this->getDescription();
				$uId = $this->getUserId();
				
				if (!($this->exist($uId))){
					$query = "INSERT INTO $table(type,description,uId) VALUES('$type','$description','$uId')";
					$result = mysql_query($query);
					
					if ($result){
						return TRUE;
					}else{
						return FALSE;
					}
				}else{
					return "Duplicate data";
				}				
			}catch(Exception $ex){
				print $ex;
			}				
		}
		
		public function exist($uid){
			try{
				$table = GROUPS;
				$type = $this->getType();
				$description = $this->getDescription();
				
				$query = "SELECT * FROM $table WHERE type='$type' and uId='$uid'";
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
				$table = Groups;
				
				$query = "DELETE FROM $table WHERE groupId='$id'";
					$result = mysql_query($query);
					
					if($result==1){
						return TRUE;
					}				
			}catch(Exception $ex){
				print $ex;
			}	
		}
		
		public static function update($type,$description,$gid){
			try{
				$table = GROUPS;
				
				$query = "UPDATE $table SET type='$type', description='$description' WHERE groupId='$gid'";
				$result = mysql_query($query);
				
				if ($result){
					return TRUE;
				}else{
					return "Groups update failed";
				}			
			}catch(Exception $ex){
				print $ex;
			}	
		}
		
		public function getId(){
			try{
				$table = GROUPS;
				$type = $this->getType();
				$description = $this->getDescription();
				$validityPeriod = $this->getValidityPeriod();
				$amount = $this->getAmount();
				$uId = $this->getUserId();
				
				$query = "SELECT * FROM $table WHERE type='$type' and description = '$description' and 
						  validity_period='$validityPeriod' ";
				$result = mysql_query($query);
				
				while($row=mysql_fetch_assoc($result)){
					return $row['GroupsId'];
				}
			}catch(Exception $ex){
				print $ex;
			}
		}
		
		public static function selectAll($uid){
			try{
				$userAccountTable = USERACCOUNT;
				$GroupsTable = GROUPS;
				
				$query = "SELECT * FROM $userAccountTable u right join $GroupsTable s on u.accountId=s.uId where u.accountId=$uid";
				$result = mysql_query($query);
				return $result;
			}catch(Exception $ex){
				print $ex;
			}
		}
		
		public static function getGroups($uId){
			try{
				$userAccountTable = USERACCOUNT;
				$GroupsTable = GROUPS;
				
				$query = "SELECT * FROM $userAccountTable u right join $GroupsTable s on u.accountId=s.uId 
					      where u.accountId=$uId";
				$result = mysql_query($query);
				return $result;
			}catch(Exception $ex){
				print $ex;
			}
		}
		
		public static function getGroupId($type,$uId){
			try{
				$userAccountTable = USERACCOUNT;
				$GroupsTable = GROUPS;
				
				$query = "SELECT * FROM $userAccountTable u right join $GroupsTable s on u.accountId=s.uId 
					      where u.accountId=$uId and s.type='$type'";
						  
				$result = mysql_query($query);
				
				if (mysql_num_rows($result)>0){
					while($row=mysql_fetch_assoc($result)){
						return $row['groupId'];
					}
				}
			}catch(Exception $ex){
				print $ex;
			}
		}
		
		public static function getGroupName($sid){
			try{
				$userAccountTable = USERACCOUNT;
				$GroupsTable = GROUPS;
				
				$query = "SELECT type FROM $userAccountTable u right join $GroupsTable s on u.accountId=s.uId 
					      where s.GroupsId=$sid";
						  
				$result = mysql_query($query);
				
				if (mysql_num_rows($result)>0){
					while($row=mysql_fetch_assoc($result)){
						return $row['type'];
					}
				}
			}catch(Exception $ex){
				print $ex;
			}
		}
		
		public function setType($type){
			$this->type = $type;
		}
		
		public function getType(){
			return $this->type;
		}
		
		public function setDescription($desc){
			$this->description = $desc;
		}
		
		public function getDescription(){
			return $this->description;
		}
		
		public function setUserId($uId){
			$this->userAccountId = $uId;
		}
		
		public function getUserId(){
			return $this->userAccountId;
		}
    }
?>