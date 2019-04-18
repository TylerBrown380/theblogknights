<?php
	require_once 'phpincludes/Membership.php';
	$membership = new Membership();
?>
		<div id ="banner"> 
			<div id="iconImage"><img src ="bklogo2.svg" height="80"> </img> </div>
		</div>
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