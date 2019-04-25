<?php $thisPage="Account"; ?>
<?php
	error_reporting (E_ALL ^ E_NOTICE);
	require_once 'phpincludes/Membership.php';
	
	$membership = new Membership();
	if($_SESSION['status'] === 'authorized') {
		header("location: secret.php");
	}
	
	//If the user clicks the logout on the "Log Out" button on the secret page
	if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
		$membership->log_user_out();
	}
	
	//Did the user enter a password and click submit
	
	if(isset($_POST['username']) && isset($_POST['pwd'])) {
		$response = $membership->validate_user($_POST['username'], $_POST['pwd']);
		$_SESSION['Username'] = $_POST['username'];
	}
	
	
?>
<html>
	<header>
	<title>Login</title>
	</header>
	<head> 
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="login.css">
		
	</head>
	
	<body>
		<div id ="pageinfo">
			<div id="container">
				<form for="login" method="post" action ="">
					<h2> Login : <small> Enter Username and Password</small></h2>
					<p>
						<label for="name">Username: </label>
						<input type="text" name="username" value="<?php echo ($_POST['username']); ?>"/>
					</p>
					
					<p>
						<label for="pwd">Password: </label>
						<input type="password" name="pwd" />
					</p>
					
					<p>
						<input type="submit" id="submit" value="Login" name="submit" />
					</p>
				</form>
				<?php if(isset($response)) echo "<h4 class ='alert'>" . $response . "</h4>"; ?>
				
			</div>
		</div>
	</body>
</html>
