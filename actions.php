<?php

session_start();
if (!isset($_SESSION['email'])) header('Location: login.php');

switch ($_POST['action']) {
	case 'adduser':
		adduser();
		break;
	case 'deleteuser':
		deleteuser();
		break;
	case 'logout':
		logout();
		break;
	default:
		# code...
		break;
}

function adduser() {

	$database = new SQLite3("jims.db");

	# Hash+salt password
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$email = $_POST['email'];
	$name = $_POST['name'];

	$values = "'$email', '$password', '$name'";
	$query = "INSERT INTO users (email, password, name) VALUES ($values)";
	if (!$database->query($query)) die("Error: $query<br>" . $database->error);
}

function deleteuser() {
	$database = new SQLite3("jims.db");
	$query = "DELETE FROM users WHERE id=" . $_POST['id'];
	if (!$database->query($query)) die("Error: $query<br>" . $database->error);
}

function logout() {
	if ( isset($_SESSION['email']) ) unset($_SESSION['email']);
}

?>
