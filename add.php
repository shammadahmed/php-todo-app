<?php

require 'app/init.php';

if (isset($_POST['body']) && !empty(trim($_POST['body']))) {
	$query = $db->prepare(
		'INSERT INTO todos (user_id, body, completed) VALUES (:user_id, :body, :completed)'
	);

	$query->execute([
		'user_id' => $_SESSION['user_id'],
		'body' => $_POST['body'],
		'completed' => 0
	]);
}

header('Location: index.php');