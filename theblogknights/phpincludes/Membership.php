<?php 
require_once 'DAO.php';
	class Membership {
		function validate_user($un, $pwd) {
			$mysql = New Mysql();
			$ensure_credentials = $mysql->verify_account($un, $pwd);
			
			if($ensure_credentials) {
				$_SESSION['status'] = 'authorized';
				header("location: secret.php");
			} else return "Please enter a correct username and password";
		}

		function log_user_out() {
			if(isset($_SESSION['status'])) {
				unset($_SESSION['status']);
				
				if(isset($_COOKIE[session_name()])) setcookie(session_name(), '', time()-10000);
				session_destroy();
			}
		}
		
		function confirm_Member() {
			session_start();
			if($_SESSION['status'] !='authorized') header("location: account.php");
		}
	}


