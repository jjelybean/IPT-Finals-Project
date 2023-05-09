<?php
// Include database connection file
include 'db_connect.php';

// Get form data
$task_name = $_POST['title'];
$task_description = $_POST['description'];

// Insert task into database
$sql = "INSERT INTO tasks (task_name, task_description) VALUES ('$task_name', '$task_description')";
if (mysqli_query($conn, $sql)) {
    // Success - redirect back to index.php
    header('Location: index.php');
} else {
    // Error - display error message
    echo "Error: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
