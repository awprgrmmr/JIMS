<?php

session_start();
if (!isset($_SESSION['username'])) header('Location: login.php');

?>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<link href="css/global.css" rel="stylesheet">
	<link href="css/header.css" rel="stylesheet">
</head>
<body>
	<header>
		<section id="menu">
			<ul>
				<li><a href="modules/dashboard.php" target="content">Inmates</a></li>
				<li><a href="modules/inmates.php" target="content">Inmates</a></li>
				<li><a href="modules/booking.php" target="content">Booking</a></li>
			</ul>
		</section>
		<section id="user-links">
			<ul>
				<li><a href="modules/user.php" target="content">role</a></li>
				<li><a href="modules/user.php" target="content"><i class="fa fa-fw fa-user"></i><span><?php echo $_SESSION['username']; ?></span></a></li>
				<li><a href="logout.php"><i class="fa fa-fw fa-sign-out"></i></a></li>
			</ul>
		</section>
	</header>
	<div id="content">
		<iframe name="content" src="modules/dashboard.php"></iframe>
	</div>
</body>
</html>
