<?php

session_start();

function addUser($db) {
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

function deleteUser($db) {
	$stmt = $db->prepare("DELETE FROM users WHERE id=:id");
	$stmt->bindValue(':id', $_POST['id']);
	$stmt->execute();
}

function Input($name, $value, $type = 'text') {
	echo "<input type='$type' name='$name' value='$value' />";
};

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

function updateInmate($db) {
	$stmt = $db->prepare("INSERT INTO inmates (last_name, first_name, middle_name, sex, height, weight) VALUES (:last_name, :first_name, :middle_name, :sex, :height, :weight)");
	$stmt->bindValue(':last_name', $_POST['last_name']);
	$stmt->bindValue(':first_name', $_POST['first_name']);
	$stmt->bindValue(':middle_name', $_POST['middle_name']);
	$stmt->bindValue(':sex', $_POST['sex']);
	$stmt->bindValue(':height', $_POST['height']);
	$stmt->bindValue(':weight', $_POST['weight']);
	$stmt->execute();
	$stmt->close();

	$query = $db->query("SELECT seq FROM sqlite_sequence WHERE name='inmates'");
	$id = $query->fetchArray();

	$stmt = $db->prepare("INSERT INTO booking (inmate, `datetime`, charge) VALUES (:inmate, :now, :charge)");
	$stmt->bindValue(':inmate', $id['seq']);
	$stmt->bindValue(':now', time());
	$stmt->bindValue(':charge', $_POST['charge']);
	$stmt->execute();
	$stmt->close();

	$stmt = $db->prepare("INSERT INTO property (inmate, description) VALUES (:inmate, :description)");
	$stmt->bindValue(':inmate', $id['seq']);
	$stmt->bindValue(':description', $_POST['description']);
	$stmt->execute();
	$stmt->close();
}

?>
