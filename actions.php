<?php

require('functions.php');

# Connect to SQLite3 database
$db = new SQLite3("assets/data/jims.db");

switch ($_POST['action']) {
	case 'adduser': addUser($db); break;
	case 'deleteuser': deleteUser($db); break;
	case 'login': login($db); break;
	case 'logout': logout(); break;
	case 'updateinmate': updateInmate($db); break;
}

?>
