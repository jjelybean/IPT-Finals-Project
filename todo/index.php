<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Travel Notes</title>
	<link rel="stylesheet" type="text/css" href="../css/todo-style.css">
	<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
</head>
<body>
	<div class="logo">
    	<h1><a href="../landingPage.html">Travgo</a></h1>
  	</div>
	<div class="container">
		<h1>Travel Notes</h1>
		<form action="add_task.php" method="post">
			<label for="title">Title:</label>
			<input type="text" id="title" name="title" required>
			<label for="description">Description:</label>
			<textarea id="description" name="description" required></textarea>
			<button type="submit">Add Task</button>
		</form>
		<table>
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// Include database connection file
					include 'db_connect.php';

					// Get all tasks from database
					$sql = "SELECT * FROM tasks";
					$result = mysqli_query($conn, $sql);

					// Display tasks in table
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<tr>';
						echo '<td>' . $row['task_name'] . '</td>';
						echo '<td>' . $row['task_description'] . '</td>';
						echo '<td>';
						echo '<a href="edit_task.php?id=' . $row['id'] . '">Edit</a>';
						echo ' | ';
						echo '<a href="delete_task.php?id=' . $row['id'] . '">Delete</a>';
						echo '</td>';
						echo '</tr>';
					}

					// Close database connection
					mysqli_close($conn);
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
