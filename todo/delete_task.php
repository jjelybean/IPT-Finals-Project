<?php
// Include database connection file
include 'db_connect.php';

// Get task ID from URL
$id = $_GET['id'];

// Delete task from database
$sql = "DELETE FROM tasks WHERE id=$id";
mysqli_query($conn, $sql);

// Close database connection
mysqli_close($conn);

// Redirect to index page
header('Location: index.php');
exit();
?>
