<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="../travgo/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php
        // connect to MySQL database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "travelnotes";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // validate and sanitize form data
        $firstname = test_input($_REQUEST["firstname"]);
        $lastname = test_input($_REQUEST["lastname"]);
        $username = test_input($_REQUEST["username"]);
        $email = test_input($_REQUEST["email"]);
        $pass = isset($_POST["password"]) ? test_input($_POST["password"]) : '';

        
        // prepare SQL query
        $sql = "INSERT INTO users (firstname, lastname, username, email, pass) VALUES ('$firstname', '$lastname', '$username', '$email', '$pass')";

        // execute query
        if ($conn->query($sql) === TRUE) {
            echo '<div class="success-background">';
            echo '  <div class="success-container">';
            echo '  <i class="fas fa-check-circle"></i>';
            echo '  <h1>New account created successfully!</h1>';
            echo '      <form action="landingpage.html">';
            echo '        <input type="submit" value="Continue">';
            echo '      </form>';
            echo '  </div>';
            echo '</div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // close connection
        $conn->close();

        // function to validate and sanitize input data
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
</body>
</html>


