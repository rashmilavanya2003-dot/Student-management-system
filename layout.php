```php
<?php
/*
    layout.php

    This file contains the common layout
    used by the website.
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?php
        echo isset($page_title)
            ? $page_title
            : "Student Management System";
        ?>
    </title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

</head>


<body>


<!-- ================= HEADER ================= -->

<header>

    <h1>Student Management System</h1>

    <nav>

        <a href="index.html">
            Home
        </a>

        <a href="dashboard.php">
            Dashboard
        </a>

        <a href="logout.php">
            Logout
        </a>

    </nav>

</header>


<!-- ================= MAIN CONTENT ================= -->

<main>

    <?php

    /*
        The content of each page
        will be displayed here.
    */

    if (isset($content)) {

        echo $content;

    }

    ?>

</main>


<!-- ================= FOOTER ================= -->

<footer>

    <p>
        &copy; 2026 Student Management System
    </p>

</footer>


</body>

</html>
```
