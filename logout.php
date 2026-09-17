```php id="h5gk2p"
<?php

// Start the session
session_start();


// Remove all session data
session_unset();


// Destroy the session
session_destroy();


// Send the student back to the login page
header("Location: login.html");

exit();

?>
```
