<?php
    class Groupings{
    	private $groupId;
		private $memberId;
		
		public function __construct($groupId,$memberId){
			$this->groupId= $groupId;
			$this->memberId = $memberId;
		}
		
		public function joinGroup(){
			try{
				$table = GROUPINGS;
				$groupId= $this->getGroupId();
				$memberId = $this->getMemberId();
				
				if (!($this->exist())){
					$query = "INSERT INTO $table(member_id,group_id) VALUES('$memberId','$groupId')";
					$result = mysql_query($query);
										
					if($result){
						return "TRUE";
					}else{
						return "FALSE";
					}
				}else{
					return FALSE;
				}				
			}catch(Exception $ex){
				print $ex;
			}				
		}
		
		public function exist(){
			try{
				$table = GROUPINGS;
				$groupId = $this->getGroupId();
				$memberId = $this->getMemberId();
				
				$query = "SELECT * FROM $table WHERE group_id='$groupId' and member_id = '$memberId'";
				$result = mysql_num_rows(mysql_query($query));
				
				if ($result<1){
					return FALSE;
				}else{
					return TRUE;
				}
			}catch(Exception $ex){
				print $ex;
			}
		}
		
		public function delete(){
			try{
				$table = GROUPINGS;
				$groupId= $this->getGroupId();
				$memberId = $this->getMemberId();
				
				if (!($this->exist())){
					$id = $this->getId();
					$query = "DELETE FROM $table WHERE id='$id'";
					$result = mysql_query($query);
					return TRUE;
				}else{
					return FALSE;
				}				
			}catch(Exception $ex){
				print $ex;
			}	
		}
		
		public static function listGroupMembers($uid,$grpId){
			try {
				$groupTable = GROUPINGS;
				$memberTable = MEMBER;
				$userAccountTable = USERACCOUNT;
	
				;

				$query = "select * from user_accounts u right join (select * from member m right join 
						  groupings g on m.memberId=g.member_id) as temp on u.accountId=temp.uId where
					      u.accountId=uid and temp.group_id=$grpId";
				$result = mysql_query($query);
				return $result;
			} catch(Exception $ex) {
				print $ex;
			}
		}
		
		public function setGroupId($groupId){
			$this->groupId= $groupId;
		}
		
		public function getGroupId(){
			return $this->groupId;
		}
		
		public function setMemberId($memberid){
			$this->memberId = $memberid;
		}
		
		public function getMemberId(){
			return $this->memberId;
		}
    }
?>