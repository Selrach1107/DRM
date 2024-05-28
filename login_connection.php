<?php

include ("connection.php");

$login_status = "";
$message = "";

if ($_SERVER[ "REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM student or teacher WHERE email='$email'";
    // Execute query
    $result = $conn->query ($sql);
    if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];
    if (password_verify ($password, $hashed_password)) {

        $login_status = "success";
        $message = "Welcome $email";
    } else {

        $login_status = "error";
        $message = "Invalid email or password";
        } 
}
else {

$echo = "error";
$message = "Invalid email or password";
}
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Login Status</title>
</head>
<body>
<?php

if ($login_status === "success") {
    echo '<script>alert("Welcome ' .htmlspecialchars ($username) . '");</script>';
    echo '<script>window. location.href = "productform.php";</script>'; // Redirect back to login.php
}elseif ($login_status === "error") {
    echo '<script>alert ("Invalid email or password");</script>';
    echo '<script>window.location.href = "login_connection.php  ";</script>'; // Redirect back to login.php
} 

?>