<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Disable back button after logout
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// Redirect to login-option (your index page)
header("Location: index.php");
exit();
?>
