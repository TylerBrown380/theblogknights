<?php
	require_once 'phpincludes/Membership.php';
	$membership = new Membership();
	error_reporting (E_ALL ^ E_NOTICE);
?>
<link rel="stylesheet" type="text/css" href="style.css">
		<div id ="banner"> 
			<div id="iconImage"><img src ="bklogo2.svg" height="80"> </img> </div>
			<?php if ($_SESSION['status'] == 'authorized'){ 
			echo '<div id="username">Welcome, '. $_SESSION['Username'] .'</div>';
		}
			 ?>
		</div>
		<head><meta name="viewport" content="width=device-width, initial-scale=1"></head>
		<div class="navcontainer">
			<div class="main-container">
				<div id="navigation">
					<ul>
					<li<?php if ($thisPage=="Home") 
					echo " id=\"currentpage\""; ?>>
					<a href="index.php">Home</a></li>
					
					<li<?php if ($thisPage=="Blogs") 
					echo " id=\"currentpage\""; ?>>
					<a href="blogs.php">Blogs</a></li>
					
					<li<?php if ($thisPage=="Account") 
					echo " id=\"currentpage\""; ?>>
					<a href="account.php">Account</a></li>
					
					<li<?php if ($thisPage=="Contactus") 
					echo " id=\"currentpage\""; ?>>
					<a href="contact.php">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="footer">
		BlogKnights © 2019 | Tyler Brown | Tylerbrown380@u.boisestate.edu
		</div>