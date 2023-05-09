<?php
// Include database connection file
include 'db_connect.php';

// Check if form is submitted
if (isset($_POST['update_task'])) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];

	// Update task in database
	$sql = "UPDATE tasks SET task_name='$title', task_description='$description', updated_at=NOW() WHERE id=$id";
	mysqli_query($conn, $sql);

	// Redirect to index page
	header('Location: index.php');
	exit();
}

// Get task ID from URL
$id = $_GET['id'];

// Get task from database
$sql = "SELECT * FROM tasks WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Task</title>
	<link rel="stylesheet" type="text/css" href="../css/todo-style.css">
	<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
</head>
<body>
	<div class="container">
		<h1>Edit Task</h1>
		<form action="edit_task.php" method="post">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<label for="title">Title:</label>
			<input type="text" id="title" name="title" value="<?php echo $row['task_name']; ?>" required>
			<label for="description">Description:</label>
			<textarea id="description" name="description" required><?php echo $row['task_description']; ?></textarea>
			<button type="submit" name="update_task">Update Task</button>
		</form>
	</div>
</body>
</html>
