```php
<?php

// Database server
$host = "localhost";

// MySQL username
$username = "root";

// MySQL password
$password = "";

// Database name
$database = "student_management";


// Create database connection
$conn = new mysqli(
    $host,
    $username,
    $password,
    $database
);


// Check connection
if ($conn->connect_error) {

    die("Database connection failed: "
        . $conn->connect_error);

}

?>
```
