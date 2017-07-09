<?php

session_start();

$_SESSION['user_id'] = 1;

if (! isset($_SESSION['user_id'])) {
	die('You are not signed in.');
}

$dsn = 'sqlite:' . realpath(__DIR__) . '/database.sqlite';

try {
	$db = new PDO($dsn, '', '', [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	]);
} catch (PDOException $e) {
	echo $e->getMessge();
}
