```php
<?php

// Start the session
session_start();

// Connect to the database
include "db.php";


// Check whether the login form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];


    // Find the student using the username
    $sql = $conn->prepare(
        "SELECT * FROM students WHERE username = ?"
    );

    $sql->bind_param("s", $username);

    $sql->execute();

    $result = $sql->get_result();


    // Check whether username exists
    if ($result->num_rows == 1) {

        // Get student information
        $student = $result->fetch_assoc();


        // Check the password
        if (password_verify($password, $student["password"])) {

            // Save student information in the session
            $_SESSION["student_id"] = $student["id"];

            $_SESSION["student_name"] = $student["full_name"];

            $_SESSION["username"] = $student["username"];


            // Go to dashboard
            header("Location: dashboard.php");

            exit();

        } else {

            // Wrong password
            echo "<h2>Login Failed</h2>";

            echo "<p>Incorrect password.</p>";

            echo "<a href='login.html'>Try Again</a>";
        }

    } else {

        // Username does not exist
        echo "<h2>Login Failed</h2>";

        echo "<p>Username not found.</p>";

        echo "<a href='login.html'>Try Again</a>";
    }


    // Close statement
    $sql->close();
}


// Close database connection
$conn->close();

?>
```
