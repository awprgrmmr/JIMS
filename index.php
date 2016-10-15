<?php
session_start();
if (!isset($_SESSION['email'])) header('Location: login.php');
if (isset($_GET['module'])) $module = $_GET['module'];
?>
<html>
<head>
	<link rel="icon" href="images/jail.ico" type="image/x-icon" />
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<link href="css/global.css" rel="stylesheet">
	<link href="css/modules.css" rel="stylesheet">
</head>
<body>
	<header>
		<div class="container clearfix">
			<section id="icon">
				<a href="."><svg viewBox="0 0 512 512" width="28"><path d="m480,0h-448c-17.672,0-32,14.328-32,32v448c0,17.672 14.328,32 32,32h448c17.672,0 32-14.328 32-32v-448c0-17.672-14.328-32-32-32zm-304,64h48v48h-48v-48zm-64,384h-48v-384h48v384zm112,0h-48v-48h48v48zm112,0h-48v-48h48v48zm0-128c0,8.836-7.163,16-16,16h-128c-8.837,0-16-7.164-16-16v-64c0-8.837 7.163-16 16-16v-16c0-35.289 28.711-64 64-64s64,28.711 64,64v16c8.837,0 16,7.163 16,16v64zm0-208h-48v-48h48v48zm112,336h-48v-384h48v384z"/><path d="m256,192c-17.648,0-32,14.352-32,32v16h64v-16c0-17.648-14.352-32-32-32z"/><circle cx="256" cy="288" r="16"/></svg></a>
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
					<li><a href="logout.php"><i class="fa fa-fw fa-sign-out"></i></a></li>
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
