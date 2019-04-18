<?php
require_once 'constants.php';
class Mysql {
	private $conn;
	
	function __construct() {
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
						die('There was a problem connecting to database.');
	}
	function verify_account($un, $pwd) {
			
		$query = "SELECT *
				FROM users
				WHERE username = ? AND password = ?
				LIMIT 1";
			$newUsr = filter_var($un, FILTER_SANITIZE_STRING);
			$newPwd = filter_var($pwd, FILTER_SANITIZE_STRING);
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ss', $newUsr, $newPwd);
				$stmt->execute();
				
				if($stmt->fetch()) {
					$stmt->close();
					return true;
				} 
			}
		}
}

