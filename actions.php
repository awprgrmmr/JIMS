<?php

require('functions.php');

# Connect to SQLite3 database
$db = new SQLite3("assets/data/jims.db");

switch ($_POST['action']) {
	case 'adduser': adduser($db); break;
	case 'deleteuser': deleteuser($db); break;
	case 'login': login($db); break;
	case 'logout': logout(); break;
}

?>
