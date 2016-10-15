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
	<link href="css/login.css" rel="stylesheet">
</head>
<body>

<div id="login">
	<form method="post">
		<label for="email">Email</label>
		<input type="email" name="email" autocapitalize="off" autocorrect="off" autofocus/>
		<label for="password">Password</label>
		<input type="password" name="password" />
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
