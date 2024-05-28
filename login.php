<?php
include ("connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM teacher WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row["password"];

            if (password_verify($password, $hashed_password)) {
                echo '<script>
                    alert ("Login Successfully!");
                    window.location.href = "teacher/dashboard.php";
                </script>';
            }


            else {
                echo '<script>
                    alert ("Invalid username or password!");
                </script>';
            }
        }

        else {
            echo '<script>
                alert ("Invalid username or password!");
            </script>';
        }
    }

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/SigninStyle.css">
    <title>Document</title>
</head>

<body>
    
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Email" name="email" maxlength="50" minlength="6" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" maxlength="20" minlength="6" required>
            </div>
            
            <div class="remember-forgot">
                <label><input  type="checkbox"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link"> <p>Create account for <br> <a href="student/reg-stud.php">STUDENT</a><br> or<br>
            <a href="teacher/reg-teach.php">TEACHER</a></p></div>
            
        </form>

    </div>

</body>
</html>