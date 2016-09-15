<?php

session_start();
if (!isset($_SESSION['username'])) header('Location: login.php');

?>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
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
	ul {
		list-style: none;
		padding: 0;
	}
	a {
		color: inherit;
	}
	#sidebar {
		background: #546E7A;
		box-shadow: 0 0 20px rgba(0,0,0,0.25);
		color: white;
		height: 100%;
		position: fixed;
		left: 0;
		top: 0;
		width: 250px;
	}
	#content {
		margin-left: 250px;
	}
	#user-links {
		font-size: 12px;
	}
	#user-links li {
		border: 1px solid rgba(255, 255, 255, 0.2);
		display: inline-block;
	}
	#user-links a {
		display: block;
		padding: 2px 4px;
	}
	#user-links a .fa-sign-out {
		color: red;
	}
	</style>
</head>
<body>
	<aside id="sidebar">
		<section id="user-links">
			<ul>
				<li><a href="user.php"><?php echo $_SESSION['username']; ?></a></li>
				<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
			</ul>
		</section>
	</aside>
	<div id="content">
	</div>
</body>
</html>
