<?php
	require_once('../cdp/Gcm.php');
	require_once('../cgd/DaoGcm.php');
	
	class AplGcm {
		private $dao;
		
		public function __construct(){
			$this->dao = new DaoGcm();
		}
		public function __destruct(){
			// OBJ
		}
		
		public function save($gcm){
			$return = 0;
			if($this->dao->verify($gcm) == 0){
				$return = $this->dao->save($gcm);
			}
			return($return);
		}
		
		public function update($gcm){
			if($this->dao->verify($gcm) == 0){
				$return = $this->dao->update($gcm);
			}
			else{
				$this->delete($gcm);
			}
			return($return);
		}
		
		public function delete($gcm){
			$return = $this->dao->delete($gcm);
			return($return);
		}
		
		public function getAll(){
			$arrayGcm = $this->dao->getAll();
			return($arrayGcm);
		}
	}
?>