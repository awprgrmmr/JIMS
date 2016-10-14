<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$path = $_SERVER['PATH_INFO'];

if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $_SERVER['PATH_INFO']))
	header('Location: index.php?module=' . substr($_SERVER['PATH_INFO'], 1));
else return false;

?>
