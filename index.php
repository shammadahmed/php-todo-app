<?php 
	require 'app/init.php';

	$itemsQuery = $db->prepare(
		'SELECT id, user_id, body, completed FROM todos WHERE user_id = :user_id'
	);

	$itemsQuery->execute([
		'user_id' => $_SESSION['user_id']
	]);

	$items = $itemsQuery->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<title>To Do</title>
</head>
<body>
	<div id="wrapper">
		<h1>To do</h1>
		<?php if (!empty($items)) : ?>
			<ul class="items">
				<?php foreach ($items as $item) : ?>
					<li>
						<span class="item <?= $item['completed'] ? 'done' : '' ?>"><?= $item['body'] ?></span>
						<?php if (! $item['completed']) : ?>
							<a href="mark.php?as=done&item=<?= $item['id'] ?>" class="mark-done">Mark as done</a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php else : ?>
			<p>No items added yet.</p>
		<?php endif; ?>
		<form action="add.php" method="POST">
			<input type="text" name="body" placeholder="Enter item here" autocomplete="false" required class="new-item">
			<button type="submit" class="submit">Add</button>
		</form>
	</div>
</body>
</html>