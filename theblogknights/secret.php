<?php 
 $thisPage="Account";
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
				<h2>Create a New Blog Post </h2>
			</p>
			
			<p>
			<form for="Blog Post" method='POST' action='phpincludes/sendBlog.php'>
						<input type='hidden' name='uid' value=	<?php 
							if($_SESSION['status'] == 'authorized') {
								echo $_SESSION['Username'];
							} else
								echo "Anonymous";
						?>>
						<textarea class='blogTitle' name='title' placeholder="Title"></textarea><br>
                        <textarea class = 'blogPost' name='message' placeholder="Blog Post"></textarea><br>
                        <input id="submit" type="submit" value="Post">
					</form>
						</p>
				<button id="logout"> <a href="account.php?status=loggedout">Log Out</a></button>
				
			</div>

	</body>
</html>
