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

		# Verify password
		if (password_verify($_POST['password'], $result['password'])) {
			$_SESSION['email'] = $_POST['email'];
			die();
		}
		else die("Incorrect credentials.");

	}
	else die("Incorrect credentials.");
}

?>
<head>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="js/global.js" defer></script>
	<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
</head>
<body>

<div id="login">
	<form action="login.php" method="post">
		<label for="email">Email</label>
		<input value="email@email.com" type="email" name="email" autocapitalize="off" autocorrect="off" autofocus/>
		<label for="password">Password</label>
		<input value="password" type="password" name="password" />
		<input type="hidden" name="action" value="logout" />
	</form>
</div>

</body>
