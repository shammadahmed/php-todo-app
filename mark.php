<?php

require 'app/init.php';

if (isset($_GET['as'], $_GET['item'])) {
	$as = $_GET['as'];
	$itemId = $_GET['item'];

	switch ($as) {
		case 'done':
			$query = $db->prepare(
				'UPDATE todos SET completed = 1 WHERE id = :id AND user_id = :user_id'
			);

			$query->execute([
				'id' => $itemId,
				'user_id' => $_SESSION['user_id']
			]);
		break;
	}
}

header('Location: index.php');