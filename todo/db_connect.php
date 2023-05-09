<?php
// Database credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'travgo');

// Attempt to connect to MySQL database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// joining two tables
$sql = "SELECT * FROM users INNER JOIN notes ON users.id = notes.author";
$result = mysqli_query($conn, $sql);

// Check if query returned any results
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Author: " . $row["author"] . "<br>";
    }
} else {
    echo "No results found.";
}

// Close connection
mysqli_close($conn);
?>
