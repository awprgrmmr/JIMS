<?php

session_start();
if (!isset($_SESSION['username'])) header('Location: login.php');

?>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<style>
	html, body {
		height: 100%;
		margin: 0;
	}
	body {
		background: #DDD;
		font: 14px Roboto, sans-serif;
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
	header {
		background: #616161;
		box-shadow: 0 0 20px rgba(0,0,0,0.25);
		color: white;
		position: fixed;
		left: 0;
		top: 0;
		width: 100%;
	}
	header section {
		float: left;
	}
	header a {
		opacity: 0.7;
	}
	header a:hover {
		opacity: 1;
	}
	#menu li {
		float: left;
	}
	#menu a {
		border-left: 1px solid rgba(255,255,255,0.25);
		display: block;
		margin: 10px 0;
		padding: 0 10px;
	}
	#menu li:first-child a {
		border-left: none;
	}
	#user-links {
		float: right;
		font-size: 13px;
		margin: 7px;
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
		margin-top: 34px;
	}
	</style>
</head>
<body>
	<header>
		<section id="menu">
			<ul>
				<li><a href="#">Inmate List</a></li>
				<li><a href="#">Booking</a></li>
			</ul>
		</section>
		<section id="user-links">
			<ul>
				<li><a href="user.php"><i class="fa fa-fw fa-user"></i><span><?php echo $_SESSION['username']; ?></span></a></li>
				<li><a href="logout.php"><i class="fa fa-fw fa-sign-out"></i></a></li>
			</ul>
		</section>
	</header>
	<div id="content">
		This is where the content will be.
	</div>
</body>
</html>
