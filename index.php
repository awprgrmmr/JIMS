<?php
session_start();
if (!isset($_SESSION['username'])) header('Location: login.php');
?>
<html>
<head>
	
</head>
<body>
	Logged in as <?php echo $_SESSION['username']; ?>.
	<a href="login.php?action=logout">Logout</a>
</body>
</html>
