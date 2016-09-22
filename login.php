<?php

session_start();
if (isset($_POST['username'])) $_SESSION['username'] = $_POST['username'];
if (isset($_SESSION['username'])) header('Location: ./');

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
	#login {
		width: 200px;
	}
	#login header {
		font-size: 0.9em;
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
		width: 176px;
	}
	</style>
</head>
<body>

<div id="login">
	<header>JIMS LOGIN</header>
	<form method="post" action="login.php">
		<label for="username">U</label><input type="text" name="username" autocomplete="off"/>
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
