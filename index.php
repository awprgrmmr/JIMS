<?php session_start(); ?>
<html>
<head>
	<link rel="icon" href="assets/images/jail.ico" type="image/x-icon" />
	<script src="vendors/jquery/jquery-3.1.1.min.js"></script>
	<script src="assets/js/global.js" defer></script>
	<link href="assets/css/global.css" rel="stylesheet">
</head>
<?php if (!isset($_SESSION['email'])) : ?>
<body class="login-page">
<form action="actions.php" method="post">
	<label for="email">Email</label>
	<input value="email@email.com" type="email" name="email" autofocus/>
	<label for="password">Password</label>
	<input value="password" type="password" name="password" />
	<input type="hidden" name="action" value="login" />
</form>
</body>
<?php else : ?>
<body>
	<header>
		<div class="container clearfix">
			<section id="icon">
				<a href="."><img src="assets/images/jail.svg" width="28"></a>
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
							<button type="submit"><i class="fa fa-sign-out"></i></button>
						</form>
					</li>
				</ul>
			</section>
		</div>
	</header>
	<div id="main">
		<div class="content container cleafix">
			<?php
				if (isset($_GET['module'])) $module = $_GET['module'];
				if (isset($module) && file_exists("modules/$module.php"))
					include("modules/$module.php");
				else include('modules/dashboard.php');
			?>
		</div>
	</div>
</body>
<?php endif; ?>
</html>
