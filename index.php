<?php

session_start();
if (!isset($_SESSION['username'])) header('Location: login.php');

?>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<style>
	html, body {
		height: 100%;
		margin: 0;
	}
	body {
		background: #DDD;
		font: 15px 'Open Sans', sans-serif;
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
		text-decoration: none;
	}
	#sidebar {
		background: #607D8B;
		box-shadow: 0 0 20px rgba(0,0,0,0.25);
		color: white;
		height: 100%;
		position: fixed;
		left: 0;
		top: 0;
		width: 250px;
	}
	#sidebar a {
		opacity: 0.7;
	}
	#sidebar a:hover {
		opacity: 1;
	}
	#user-links {
		font-size: 13px;
		margin-top: 50px;
		text-align: center;
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
		color: #F44336;
	}
	#user-links span {
		font-size: 12px;
		margin-left: 2px;
	}
	
	#content {
		margin-left: 250px;
	}
	</style>
</head>
<body>
	<aside id="sidebar">
		<section id="user-links">
			<ul>
				<li><a href="user.php"><i class="fa fa-fw fa-user"></i><span><?php echo $_SESSION['username']; ?></span></a></li>
				<li><a href="logout.php"><i class="fa fa-fw fa-sign-out"></i></a></li>
			</ul>
		</section>
	</aside>
	<div id="content">
	</div>
</body>
</html>
