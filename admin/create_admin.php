<?php
// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Generate hashed password
$admin_password = 'dcsadmin123'; // Replace this with the actual admin password
$hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

// Insert admin account into the database
$sql = "INSERT INTO users (first_name, last_name, id_no, pic, sex, role, email, password, status) 
        VALUES ('Admin', 'Admin', 'admin123', 'admin_pic.jpg', 'male', 'admin', 'admin@example.com', '$hashed_password', 'approved')";

if ($conn->query($sql) === TRUE) {
    echo "Admin account inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
