<?php
    // start session
    session_start();

    // connect to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travgo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // validate and sanitize form data
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["Password"]);
    
    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // prepare SQL query
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    // execute query
    $result = $conn->query($sql);

    // check if there is a match
    if ($result->num_rows == 1) {
        // set session variable to indicate that the user is logged in
        $_SESSION["loggedin"] = true;

        // redirect to landing page
        header("Location: landingpage.html");
        exit;
    } else {
        // display error message
        echo '<div class="error-background">';
        echo '  <div class="error-container">';
        echo '  <i class="fas fa-exclamation-triangle"></i>';
        echo '  <h1>Invalid email or password!</h1>';
        echo '      <form action="login.html">';
        echo '        <button type="submit">Try Again</button>';
        echo '      </form>';
        echo '  </div>';
        echo '</div>';
    }

    // function to validate and sanitize input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // close connection
    $conn->close();
?>
