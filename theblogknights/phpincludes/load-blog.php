<?php
date_default_timezone_set("America/Boise");
require_once 'constants.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

$sql = "SELECT * FROM blogs ORDER BY bid desc limit 1  ";
			$result = $conn->query($sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = $result->fetch_assoc()) {
                echo "<div class ='comment-box'><p>";
                echo "<h2 class='title'>".$row['title']."</h2><br>";
				echo "<b>Author:</b>   ".$row['uid']."<br>";
				echo "<b>Date Posted:</b>   ".$row['date']."<br>";
				echo "<hr>".nl2br($row['message']);
				echo "</p>";
				if ($_SESSION['status'] == 'authorized'){ 
					echo "<form class='delete-blog' method='POST' action='".deleteBlog()."'>
					<input type ='hidden' name='bid' value='".$row['bid']."'>
					<button name='blogDelete'>Delete</button>
					</form>
					<form class='edit-blog' method='POST' action='editcomment.php'>
					<input type ='hidden' name='bid' value='".$row['bid']."'>
					<input type ='hidden' name='title' value='".$row['title']."'>
					<input type ='hidden' name='uid' value='".$row['uid']."'>
					<input type ='hidden' name='date' value='".$row['date']."'>
					<input type ='hidden' name='message' value='".$row['message']."'>
					<button name='blogEdit'>Edit</button>
					</form>
					</div>";
				} else {
					echo "</div>";
				}
			} 
			} else {
				echo "There are no blogs";
			}

			function deleteBlog() {
				$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
			if(!$conn) {
				die("Connection failed: ".mysqli_connect_error());
			}
			if (isset($_POST['blogDelete'])) {
				$bid = $_POST['bid'];
				$sql = "DELETE FROM blogs WHERE bid='$bid'";
				$result = $conn->query($sql);
				Header('Location: '.$_SERVER['PHP_SELF']);
			}
			}