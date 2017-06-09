<?php
	$pageTitle = 'Logout';
	require_once('header.php');
?>
<?php
//destroy the session (started by header.php)
session_destroy();

header('location:login.php');
?>
