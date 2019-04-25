<?php 
 $thisPage="Blogs";
 ob_start();
 error_reporting (E_ALL ^ E_NOTICE); 
	require_once 'phpincludes/Membership.php';
	$membership = new Membership();
    $membership->confirm_Member();
  

?>

<html>
<meta name=”viewport” content=”width=device-width, initial-scale=1″>
	<header>
	<title> BlogKnights</title>
	</header>
	<head> 
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<?php include "phpincludes/navigation.php"; ?>
		<div id ="pageinfo">
			<p>
				<h2>Edit Blog Post </h2>
			
            <?php 
             $bid = htmlentities($_POST['bid']);
             $title = htmlentities($_POST['title']);
             $uid = htmlentities($_POST['uid']);
             $date = date('Y/m/d h:i:s');
             $message = htmlentities($_POST['message']);
            
			echo "<form method='POST' action='".editBlog()."'>
                    <input type ='hidden' name='bid' value='".$bid."'>
                    <input type ='hidden' name='title' value='".$title."'>
                    <input type ='hidden' name='uid' value='".$uid."'>
                    <input type ='hidden' name='date' value='".$date."'>
                    <input type ='hidden' name='message' value='".$message."'>
                    <textarea class='blogTitle' name='title'>".$title."</textarea><br>
                    <textarea class ='blogPost' name='message'>".$message."</textarea><br>
                    <button class='editButton' type='submit' name='commentSubmit'>Edit</button>
                  </form>"
                    ?>
						</p>
				<button id="logout"> <a href="account.php?status=loggedout">Log Out</a></button>
			</div>
	</body>
</html>
<?php

function editBlog() {
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
if(isset($_POST['bid'],$_POST['title'], $_POST['uid'], $_POST['message'])) {
    $bid = $_POST['bid'];
    $title = htmlentities($_POST['title']);
    $uid = htmlentities($_POST['uid']);
    $date = date('Y/m/d h:i:s');
    $message = htmlentities($_POST['message']);

    $sql = "UPDATE blogs SET title = '$title', message='$message' WHERE bid= '$bid'";
    $result = $conn->query($sql);
}
}
?>


