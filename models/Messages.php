<?php
    class Messages{
    	private$subject;
		private $message;
		private $status;
		private $sentDate;
		private $recipient;
		private $type;
		private $uId;
		
		public function __construct($subject,$message,$status,$sentDate,$recipient,$type,$uId){
			$this->subject = $subject;
			$this->message = $message;
			$this->status = $status;
			$this->sentDate = $sentDate;
			$this->recipient = $recipient;
			$this->type = $type;
			$this->uId = $uId;
		}
		
		public function sendMessage(){
			try{
				$table = MESSAGES;
				$subject = $this->getSubject();
				$message = $this->getMessage();
				$status = $this->getStatus();
				$sentDate = $this->getSentDate();
				$type = $this->getType();
				$uId = $this->getUid();
				$recipient = $this->getRecipient();
			
				$query = "INSERT INTO $table(subject,content,sent,sentDate,recipient,type,uId) 
						 VALUES('$subject','$message','$status','$sentDate','$recipient','$type','$uId')";
				
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
		
		public static function delete($id){
			try{
				$table = MESSAGES;
									
				if ($this->exist()){
					$query = "DELETE FROM $table WHERE id='$id'";
					$result = mysql_query($query);
					
					if(mysql_affected_rows($result)>0){
						return TRUE;
					}else{
						return "Delete failed";
					}
				}else{
					return "No such person exists";
				}				
			}catch(Exception $ex){
				print $ex;
			}	
		}
		
		public function update(){
			try{
				$table = MESSAGES;
				$subject = $this->getSubject();
				$messages = $this->getMessage();
				$type = $this->getType();
				
				if (!($this->exist())){
					$id = $this->getId();
					$query = "UPDATE $table SET subject='$subject', content='$messages, type='$type' WHERE id='$id'";
					$result = mysql_query($query);
					return TRUE;
				}else{
					return FALSE;
				}				
			}catch(Exception $ex){
				print $ex;
			}	
		}
		
		public function getId(){
			try{
				$table = MESSAGES;
				$subject = $this->getSubject();
				$messages = $this->getMessage();
				$type = $this->getType();
				
				$query = "SELECT id FROM $table WHERE subject='$subject' and content = '$messages' and type='$type'";
				$result = mysql_query($query);
				if ($result<1){
					return $result;
				}else{
					return $result;
				}
			}catch(Exception $ex){
				print $ex;
			}
		}
		
		public function setsubject($subject){
			$this->subject =$subject;
		}
		
		public function getSubject(){
			return $this->subject;
		}
		
		public function setMessage($message){
			$this->message= $message;
		}
		
		public function getMessage(){
			return $this->message;
		}
		
		public function setStatus($status){
			$this->status= $status;
		}
		
		public function getStatus(){
			return $this->status;
		}
		
		public function setType($type){
			$this->type = $type;
		}
		
		public function getType(){
			return $this->type;
		}
		
		public function setRecipient($recipient){
			$this->recipient = $recipient;
		}
		
		public function getRecipient(){
			return $this->recipient;
		}
		
		
		public function setSentDate($sentDate){
			$this->sentDate= $sentDate;
		}
		
		public function getSentDate(){
			return $this->sentDate;
		}
		
		public function setUID($uId){
			$this->sentDate= $uId;
		}
		
		public function getUID(){
			return $this->uId;
		}
    }
?>