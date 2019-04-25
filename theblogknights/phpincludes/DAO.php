<?php
ob_start();
require_once 'constants.php';
session_start();
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
			$newUsr = htmlentities($un);
			$newPwd = htmlentities($pwd);
			$newPwd = hash('sha256', $newPwd);
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ss', $newUsr, $newPwd);
				$stmt->execute();
				
				if($stmt->fetch()) {
					$stmt->close();
					$_SESSION['Username'] = $un;
					return true;
				} 
			}
		}

		function getComments() {
			$sql = "SELECT * FROM comments ORDER BY cid desc limit 9  ";
			$result = $this->conn->query($sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = $result->fetch_assoc()) {
				echo "<div class ='comment-box'><p>";
				echo "<b>Author:</b>   ".$row['uid']."<br>";
				echo "<b>Date Posted:</b>   ".$row['date']."<br>";
				echo "<hr>".nl2br($row['message']);
				echo "</p>";
				if ($_SESSION['status'] == 'authorized'){ 
					echo "<form class='delete-form' method='POST' action='".deleteComments()."'>
					<input type ='hidden' name='cid' value='".$row['cid']."'>
					<button name='commentDelete'>Delete</button>
					</form>
					</div>";
				} else {
					echo "</div>";
				}
					
			} 
			} else {
				echo "There are no comments";
			}
		}
}
function deleteComments() {
	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
if (isset($_POST['commentDelete'])) {
	$cid = $_POST['cid'];
	$sql = "DELETE FROM comments WHERE cid='$cid'";
	$result = $conn->query($sql);
	Header('Location: '.$_SERVER['PHP_SELF']);
}
}

