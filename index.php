<?php

session_start();
if (!isset($_SESSION['username'])) header('Location: login.php');

?>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>
<body>
	<header>
		<section id="menu">
			<ul>
				<li><a href="#">Inmates</a></li>
				<li><a href="#">Booking</a></li>
			</ul>
		</section>
		<section id="user-links">
			<ul>
				<li>role</li>
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
