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
				<li><a href=".">Dashboard</a></li>
				<li><a href="inmates">Inmates</a></li>
				<li><a href="booking">Booking</a></li>
			</ul>
		</section>
		<section id="user-links">
			<ul>
				<li><a href="user">role</a></li>
				<li><a href="user"><i class="fa fa-fw fa-user"></i><span><?php echo $_SESSION['username']; ?></span></a></li>
				<li><a href="logout"><i class="fa fa-fw fa-sign-out"></i></a></li>
			</ul>
		</section>
	</header>
	<div id="content">
		<?php isset($_GET['module']) ? include('modules/' . $_GET['module'] . '.php') : include('modules/dashboard.php'); ?>
	</div>
</body>
</html>
