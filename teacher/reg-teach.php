<?php
include 'reg-teach-con.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/SignupStyle.css">
    <title>Registration</title>
</head>
<body>
    <div class="wrapper">
        <div class="title">
            <div><h2>TEACHER REGISTRATION</h2></div>
        </div>
        <form class="Mycontainer" action="reg-teach.php" method="POST">

            <div class="container">Have a DRM Account?<a href="../login.php"> SIGN IN</a></div>
           
            <div class="starter"><h2>Sign-up</h2></div>
            
            <div class="field">
                <label for="first_name">First Name:</label>
                <input type="text" placeholder="First Name" name="first_name" required>
           
                <label for="last_name">Last Name:</label>
                <input type="text" placeholder="Last Name" name="last_name" required>

                <label for="teacher_id">Teacher ID:</label>
                <input type="text" placeholder="Teacher ID" name="teacher_id" required maxlength= "9">

                <label for="sex">Sex:</label>
                <select name="sex" id="section" required>
                    <option value="">Select Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            
                <label for="email">Email:</label>
                <input type="email" placeholder="Email" name="email" required>
           
                <label for="password">Password:</label>
                <input type="password" placeholder="password" name="password" required>
            
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" placeholder="Confirm Password" name="confirm_password" required>
            
                <input type="submit" value="SIGN UP"/>
            </div>
        </form>
    </div>
</body>
</html>