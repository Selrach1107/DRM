<?php
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

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$id_no = $_POST['id_no'];
$pic = $_FILES['pic']['name'];
$sex = $_POST['sex'];
$role = $_POST['role'];
$email = $_POST['email'];
$password = $_POST['password']; // Store password in plain text

// Directory for file uploads
$upload_directory = 'uploads/';

// Create uploads directory if it doesn't exist
if (!file_exists($upload_directory)) {
    mkdir($upload_directory, 0777, true);
}

// Upload file
$target_file = $upload_directory . basename($pic);
move_uploaded_file($_FILES['pic']['tmp_name'], $target_file);

// Insert data into database
$sql = "INSERT INTO users (first_name, last_name, id_no, pic, sex, role, email, password) VALUES ('$first_name', '$last_name', '$id_no', '$pic', '$sex', '$role', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">
        alert("Registration successful. Await admin approval.");
        window.location = "login_form.php";
        </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
