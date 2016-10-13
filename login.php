<?php

session_start();

# If logged in, redirect to index
if (isset($_SESSION['email'])) header('Location: ./');

# Login attempt
if (isset($_POST['email'])) {

	# Connect to SQLite3 database
	$database = new SQLite3("jims.db");

	# Query user password
	$query = "SELECT password FROM users WHERE email='" . $_POST['email'] . "'";
	$result = $database->query($query);

	# Check if user is found
	if ($result = $result->fetchArray()) {

		# Set password if not set
		#if ($result['password'] == NULL) {
		#	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		#	$query = "UPDATE users SET password='$password' WHERE email='" . $_POST['email'] . "'";
		#	$database->query($query);
		#	die('Password set.');
		#}

		# Verify password
		if (password_verify($_POST['password'], $result['password'])) {
			$_SESSION['email'] = $_POST['email'];
			die();
		}

	}
	else die("Incorrect credentials.");
}

?>
<head>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<style>
	body {
		display: flex;
		align-items: center;
		justify-content: center;
		font: 16px Inconsolata, sans-serif;
	}
	#login {
		text-align: center;
		width: 250px;
	}
	#login header {
		font-weight: bold;
		letter-spacing: 1px;
		margin-bottom: 5px;
	}
	#login label {
		background: #444444;
		border: 1px solid #FFFFFF;
		border-bottom-left-radius: 3px;
		border-top-left-radius: 3px;
		color: #FFFFFF;
		display: inline-block;
		margin: 5px 0;
		font-size: 12px;
		padding: 6px 8px;
		vertical-align: top;
	}
	#login input {
		background: #FFFFFF;
		border: none;
		border-bottom-right-radius: 3px;
		border-top-right-radius: 3px;
		margin: 5px 0;
		padding: 5px;
		width: 200px;
	}
	</style>
</head>
<body>

<div id="login">
	<header>JIMS LOGIN</header>
	<form method="post">
		<label for="email">E</label><input type="email" name="email" autocomplete="off"/>
		<label for="password">P</label><input type="password" name="password" autocomplete="off"/>
	</form>
	<script>
		$("input").keypress(function(event) {
		    if (event.which == 13) {
		        event.preventDefault();
						$.post('login.php', $('form').serialize(), function(data) {
							if (data != '') alert(data);
							else location.reload();
						});
		    }
		});
	</script>
</div>

</body>
