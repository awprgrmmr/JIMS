<?php

$root = $_SERVER['DOCUMENT_ROOT'];

if (isset($_SERVER['PATH_INFO']))
	$path = $_SERVER['PATH_INFO'];
else return false;

if (!file_exists($root . $path)) {
	$module = substr($path, 1);
	require('index.php');
}
else return false;

?>
