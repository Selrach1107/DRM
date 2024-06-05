<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}

// Include database connection
include('db_connection.php');

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Get form data
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_new_password = $_POST['confirm_new_password'];

// Simple validation
if ($new_password != $confirm_new_password) {
    echo "New passwords do not match.";
    exit();
}

// Fetch the current password from the database
$query = "SELECT password FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($current_db_password);
$stmt->fetch();
$stmt->close();

// Verify the current password
if ($current_password != $current_db_password) {
    echo "Current password is incorrect.";
    exit();
}

// Update the password in the database
$update_query = "UPDATE users SET password = ? WHERE id = ?";
$update_stmt = $conn->prepare($update_query);
$update_stmt->bind_param("si", $new_password, $user_id);
if ($update_stmt->execute()) {
    echo "Password updated successfully.";
} else {
    echo "Failed to update password.";
}

$conn->close();
?>
