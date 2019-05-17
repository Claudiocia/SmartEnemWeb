<?php
	class Gcm {
		private $registrationId;
		private $newRegistrationId;
		
		public function __construct($registrationId='', $newRegistrationId=''){
			$this->registrationId = $registrationId;
			$this->newRegistrationId = $newRegistrationId;
		}
		public function __destruct(){
			// OBJ
		}
		
		public function getRegistrationId(){
			return($this->registrationId);
		}
		public function setRegistrationId($registrationId){
			$this->registrationId = $registrationId;
		}
		
		public function getNewRegistrationId(){
			return($this->newRegistrationId);
		}
		public function setNewRegistrationId($newRegistrationId){
			$this->newRegistrationId = $newRegistrationId;
		}
	}
?>