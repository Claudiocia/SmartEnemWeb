<?php
	require_once('Database.php');
	
	class DaoGcm {
		private $conn;
		
		
		public function __construct(){
			$this->conn = new Database();
		}
		public function __destruct(){
			$this->conn->getConn()->close();
		}
		
		
		public function save($gcm){
			$data = array();
			$data[] = $gcm->getRegistrationId();
			$query = <<<SQL
				INSERT INTO
					gcm_register(registration_id)
					VALUES("$data[0]")
SQL;
			$this->conn->getConn()->query($query);
			return($this->conn->getConn()->affected_rows);
		}
		
		
		public function update($gcm){
			$data = array();
			$data[] = $gcm->getRegistrationId();
			$data[] = $gcm->getNewRegistrationId();
			$query = <<<SQL
				UPDATE
					gcm_register
					SET
						registration_id = "$data[1]"
					WHERE
						registration_id LIKE "$data[0]"
SQL;
			$this->conn->getConn()->query($query);
			return($this->conn->getConn()->affected_rows);
		}
		
		
		public function delete($gcm){
			$data = array();
			$data[] = $gcm->getRegistrationId();
			$query = <<<SQL
				DELETE FROM
					gcm_register
					WHERE
						registration_id LIKE "$data[0]"
SQL;
			$this->conn->getConn()->query($query);
			return($this->conn->getConn()->affected_rows);
		}
		
		
		public function verify($gcm){
			$data = array();
			$data[] = $gcm->getRegistrationId();
			$query = <<<SQL
				SELECT
					registration_id
					FROM
						gcm_register
					WHERE
						registration_id LIKE "$data[0]"
					LIMIT 1
SQL;
			$result = $this->conn->getConn()->query($query);
			$data = $result->num_rows;
			$result->free();
			return($data);
		}
		
		
		public function getAll(){
			$query = <<<SQL
				SELECT
					registration_id
					FROM
						gcm_register
SQL;
			$result = $this->conn->getConn()->query($query);
			$arrayGcm = array();
			while($data = $result->fetch_object()){
				$arrayGcm[] = new Gcm($data->registration_id);
			}
			$result->free();
			return($arrayGcm);
		}
	}
?>