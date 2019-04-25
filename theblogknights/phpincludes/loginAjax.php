<?php
require_once 'constants.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

if(isset($_POST['username'], $_POST['pwd'])) {
    $un = htmlentities($_POST['username']);
    $pwd = htmlentities($_POST['pwd']);
    $query = "SELECT *
				FROM users
				WHERE username = $un AND password = $pwd
				LIMIT 1";
            $result = $conn->query($query);
			if ($result == true) {
				
			} 
			 else {
				
            }
        }
        
            
            