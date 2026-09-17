```php
<?php

// Connect to the database
include "db.php";


// Check whether the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get data from the registration form
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    // Check whether the username already exists
    $check = $conn->prepare(
        "SELECT id FROM students WHERE username = ?"
    );

    $check->bind_param("s", $username);

    $check->execute();

    $result = $check->get_result();


    if ($result->num_rows > 0) {

        // Username already exists
        echo "<h2>Registration Failed</h2>";

        echo "<p>Username already exists.</p>";

        echo "<a href='register.html'>Go Back</a>";

    } else {

        // Encrypt the password
        $hashed_password = password_hash(
            $password,
            PASSWORD_DEFAULT
        );


        // Insert student into database
        $sql = $conn->prepare(
            "INSERT INTO students
            (full_name, username, email, password)
            VALUES (?, ?, ?, ?)"
        );


        $sql->bind_param(
            "ssss",
            $full_name,
            $username,
            $email,
            $hashed_password
        );


        // Execute the query
        if ($sql->execute()) {

            echo "<h2>Registration Successful!</h2>";

            echo "<p>Your account has been created successfully.</p>";

            echo "<a href='login.html'>Login Now</a>";

        } else {

            echo "<h2>Registration Failed</h2>";

            echo "<p>Something went wrong. Please try again.</p>";

            echo "<a href='register.html'>Go Back</a>";
        }
    }


    // Close statements
    $check->close();

    if (isset($sql)) {
        $sql->close();
    }
}


// Close database connection
$conn->close();

?>
```
