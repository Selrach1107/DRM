<?php
// Start session
session_start();


// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");



// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a designated logout page or another page
header("Location: ../form/login_form.php"); // Replace 'logout.php' with the appropriate URL
exit();
?>
