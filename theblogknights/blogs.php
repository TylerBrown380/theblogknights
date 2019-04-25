<?php 
$thisPage="Blogs";
date_default_timezone_set("America/Boise");
include "phpincludes/comments.inc.php";
error_reporting (E_ALL ^ E_NOTICE);
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
		<?php include "phpincludes/load-blog.php"; ?>
				<hr>
			<div class="comment">
		
                <form for="comments" method='POST' action='phpincludes/comments.inc.php' class="ajax">
						<input type='hidden' name='uid' value=	<?php 
							if($_SESSION['status'] == 'authorized') {
								echo $_SESSION['Username'];
							} else
								echo "Anonymous";
						?>>
                        <textarea name='message' placeholder="Your Comment here..."></textarea><br>
                        <input id="submit" type="submit" value="comment">
					</form>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
					<script src = "js/main.js"></script>
			</div>
			<div class="alert alert-success" id="success-alert" style="display:none"> Comment successfully posted!</div>
			<div id="all_comments"><?php
				$mysql = New Mysql();
				$mysql->getComments();
			?></div>
		</div>
	</body>
</html>
