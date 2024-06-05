<?php
session_start();

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
$email = $_POST['email'];
$role = $_POST['role'];
$password = $_POST['password']; // Password is stored in plain text

// Validate user credentials
$sql = "SELECT * FROM users WHERE email='$email' AND role='$role' AND status='approved'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, check password
    $row = $result->fetch_assoc();
    if ($password == $row['password']) { // Compare plain text passwords
        // Password is correct, set session variables
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        // Redirect user to profile page based on role
        if ($row['role'] == 'teacher') {
            header("Location: ../teacher/teacher_profile.php");
        } elseif ($row['role'] == 'student') {
            header("Location: ../student/student_profile.php");
        } else {
            header("Location: ../admin/admin_profile.php");
        }
        exit();
    } else {
        // Invalid password
        echo "Invalid email or password.";
    }
} else {
    // User does not exist
    echo '<script type="text/javascript">
        alert("Invalid email, password or role. PlEASE CHECK YOUR ACCOUNT IF APPROVE");
        window.location = "login_form.php";
        </script>';
}

$conn->close();
?>
