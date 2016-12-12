<?php
#
header("Access-Control-Allow-Origin: *");

$base = substr(__DIR__, strlen(dirname(__DIR__)));
$root = $_SERVER['SERVER_NAME'] . $base;

# Handle URI variables
$module = isset($_GET['module']) ? $_GET['module'] : 'dashboard';
$query = isset($_GET['query']) ? $_GET['query'] : false;

include('functions.php');

if ($module == 'login' && isLoggedIn()) header("Location: //$root");
if (credentialsRequired() && !isLoggedIn()) header("Location: //$root/login");

$db = new SQLite3("assets/data/jims.db");

?>
