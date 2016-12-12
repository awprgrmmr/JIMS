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
	$stmt = $db->prepare("INSERT INTO inmates (last_name, first_name, middle_name, aka, sex, perm_address, temp_address, ssn, dob, sex, height, weight, `foreign`, birthplace, dl, contact, occupation, education) VALUES (:last_name, :first_name, :middle_name, :aka, :sex, :perm_address, :temp_address, :ssn, :dob, :sex, :height, :weight, :frgn, :birthplace, :dl, :contact, :occupation, :education)");
	$stmt->bindValue(':last_name', $_POST['last_name']);
	$stmt->bindValue(':first_name', $_POST['first_name']);
	$stmt->bindValue(':middle_name', $_POST['middle_name']);
	$stmt->bindValue(':aka', $_POST['aka']);
	$stmt->bindValue(':perm_address', $_POST['perm_address']);
	$stmt->bindValue(':temp_address', $_POST['temp_address']);
	$stmt->bindValue(':ssn', $_POST['ssn']);
	$stmt->bindValue(':dob', $_POST['dob']);
	$stmt->bindValue(':sex', $_POST['sex']);
	$stmt->bindValue(':height', $_POST['height']);
	$stmt->bindValue(':weight', $_POST['weight']);
	$stmt->bindValue(':frgn', $_POST['foreign']);
	$stmt->bindValue(':birthplace', $_POST['birthplace']);
	$stmt->bindValue(':dl', $_POST['dl']);
	$stmt->bindValue(':contact', $_POST['contact']);
	$stmt->bindValue(':occupation', $_POST['occupation']);
	$stmt->bindValue(':education', $_POST['education']);
	$stmt->execute();
	$stmt->close();

	$query = $db->query("SELECT seq FROM sqlite_sequence WHERE name='inmates'");
	$id = $query->fetchArray();

	$stmt = $db->prepare("INSERT INTO booking (inmate, `datetime`, charge, agency, documents, clerk, officer) VALUES (:inmate, :now, :charge, :agency, :documents, :clerk, :officer)");
	$stmt->bindValue(':inmate', $id['seq']);
	$stmt->bindValue(':now', time());
	$stmt->bindValue(':charge', $_POST['charge']);
	$stmt->bindValue(':agency', $_POST['agency']);
	$stmt->bindValue(':documents', $_POST['documents']);
	$stmt->bindValue(':clerk', $_POST['clerk']);
	$stmt->bindValue(':officer', $_POST['officer']);
	$stmt->execute();
	$stmt->close();

	$stmt = $db->prepare("INSERT INTO property (inmate, description) VALUES (:inmate, :description)");
	$stmt->bindValue(':inmate', $id['seq']);
	$stmt->bindValue(':description', $_POST['description']);
	$stmt->execute();
	$stmt->close();
}

?>
