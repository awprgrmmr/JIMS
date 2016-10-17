<?php
session_start();
if (!isset($_SESSION['email'])) header('Location: login.php');
if (isset($_GET['module'])) $module = $_GET['module'];
?>
<html>
<head>
	<link rel="icon" href="images/jail.ico" type="image/x-icon" />
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="js/global.js" defer></script>
	<link href="css/global.css" rel="stylesheet">
	<link href="css/modules.css" rel="stylesheet">
</head>
<body>
	<header>
		<div class="container clearfix">
			<section id="icon">
				<a href="."><img src="images/jail.svg" width="28"></a>
			</section>
			<section id="search">
				<form action="search.php"><input type="text" placeholder="Search" /></form>
			</section>
			<section id="menu">
				<ul>
					<li><a href="inmates">Inmates</a></li>
				</ul>
			</section>
			<section id="user-links">
				<ul>
					<li><a href="settings"><i class="fa fa-cog"></i></a></li>
					<li>
						<form action="actions.php">
							<input type="hidden" name="action" value="logout">
							<button type="submit"><i class="fa fa-fw fa-sign-out"></i></button>
						</form>
					</li>
				</ul>
			</section>
		</div>
	</header>
	<div id="main">
		<div class="content container cleafix">
			<?php isset($module) && file_exists('modules/' . $module . '.php') ? include('modules/' . $module . '.php') : include('modules/dashboard.php'); ?>
		</div>
	</div>
</body>
</html>
