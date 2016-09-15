<?php

session_start();
if (!isset($_SESSION['username'])) header('Location: login.php');

?>
<html>
<head>
	<style>
	html, body {
		height: 100%;
		margin: 0;
	}
	body {
		background: #DDD;
		font: 15px Inconsolata, sans-serif;
	}
	* {
		line-height: 1em;
		margin: 0;
	}
	#sidebar {
		background: #546E7A;
		box-shadow: 0 0 20px rgba(0,0,0,0.25);
		height: 100%;
		position: fixed;
		left: 0;
		top: 0;
		width: 250px;
	}
	#content {
		margin-left: 250px;
	}
	</style>
</head>
<body>
	<aside id="sidebar"></aside>
	<div id="content">
		Logged in as <?php echo $_SESSION['username']; ?>.
		<a href="logout.php">Logout</a>
	</div>
	
</body>
</html>
