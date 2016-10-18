<?php

session_start();

# Connect to SQLite3 database
$db = new SQLite3("assets/data/jims.db");

switch ($_POST['action']) {
	case 'adduser':		adduser($db);		break;
	case 'deleteuser':	deleteuser($db);	break;
	case 'login':			login($db);			break;
	case 'logout':			logout();			break;
}

function adduser($db) {
	$stmt = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
	$stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
	$stmt->bindValue(':email', $_POST['email']);
	$stmt->execute();
}

function deleteuser($db) {
	$stmt = $db->prepare("DELETE FROM users WHERE id=:id");
	$stmt->bindValue(':id', $_POST['id']);
	$stmt->execute();
}

function login($db) {
	# Query database for password
	$stmt = $db->prepare("SELECT password FROM users WHERE email=:email");
	$stmt->bindValue(':email', $_POST['email']);
	$result = $stmt->execute();

	# Verify password
	$user = $result->fetchArray();
	if (password_verify($_POST['password'], $user['password']))
		$_SESSION['email'] = $_POST['email'];
	else die("Invalid credentials.");
}

function logout() {
	if (isset($_SESSION['email'])) unset($_SESSION['email']);
}

?>
