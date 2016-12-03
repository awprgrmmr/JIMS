<?php

session_start();

function adduser($db) {
	$stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
	$stmt->bindValue(':name', $_POST['name']);
	$stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
	$stmt->bindValue(':email', $_POST['email']);
	$stmt->execute();
}

function credentialsRequired() {
	global $module;
  return $module == 'login' ? false : true;
}

function deleteuser($db) {
	$stmt = $db->prepare("DELETE FROM users WHERE id=:id");
	$stmt->bindValue(':id', $_POST['id']);
	$stmt->execute();
}

function isLoggedIn() {
	return isset($_SESSION['email']) ? true : false;
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
	$_SESSION = array();
	session_destroy();
}

function rootPath($path) {
	global $base;
	echo "$base/$path";
}

?>
