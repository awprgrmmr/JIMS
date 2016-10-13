<?php

session_start();

# If logged in, redirect to index
if (isset($_SESSION['email'])) header('Location: ./');

# Login attempt
if (isset($_POST['email'])) {

	# Connect to SQLite3 database
	$database = new SQLite3("jims.db");

	# Query user's password
	$query = "SELECT password FROM users WHERE email='" . $_POST['email'] . "'";
	$result = $database->query($query);

	# If user found, verify password
	if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
		if ($row['password'] == NULL) {
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$query = "UPDATE users SET password='$password' WHERE email='" . $_POST['email'] . "'";
			$database->query($query);
		}

		if (password_verify($_POST['password'], $row['password']))
			$_SESSION['email'] = $_POST['email'];
	}

	if (isset($_SESSION['email'])) header('Location: ./');
	else echo "Incorrect username or password.";
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
		font: 15px Inconsolata, sans-serif;
	}
	#login header {
		font-size: 0.9em;
		font-weight: bold;
		letter-spacing: 1px;
		margin-bottom: 1em;
		text-align: center;
	}
	#login label {
		background: #444444;
		border: 1px solid #FFFFFF;
		border-bottom-left-radius: 3px;
		border-top-left-radius: 3px;
		color: #FFFFFF;
		display: inline-block;
		margin-bottom: 10px;
		font-size: 12px;
		padding: 6px 8px;
		vertical-align: top;
	}
	#login input {
		background: #FFFFFF;
		border: none;
		border-bottom-right-radius: 3px;
		border-top-right-radius: 3px;
		padding: 5px;
	}
	</style>
</head>
<body>

<div id="login">
	<header>JIMS LOGIN</header>
	<form method="post" action="login.php">
		<label for="email">E</label><input type="email" name="email" autocomplete="off"/>
		<br>
		<label for="password">P</label><input type="password" name="password" autocomplete="off"/>
	</form>
	<script>
		$("input").keypress(function(event) {
		    if (event.which == 13) {
		        event.preventDefault();
		        $("form").submit();
		    }
		});
	</script>
</div>

</body>
