<?php

$base = substr(__DIR__, strlen(dirname(__DIR__)));
$root = $_SERVER['SERVER_NAME'] . $base;

$module = isset($_GET['module']) ? $_GET['module'] : 'dashboard';
if (!file_exists("modules/$module.php") && $module != 'login') $module = 'dashboard';

include('functions.php');

if (!credentialsRequired() && isLoggedIn()) header("Location: //$root");
if (credentialsRequired() && !isLoggedIn()) header("Location: //$root/login");

?>
