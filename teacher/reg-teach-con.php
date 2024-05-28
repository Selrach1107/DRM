<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "account_db";


$conn = new mysqli($servername,$username,$password,$dbname);


if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // get from data
    $first_name =$_POST['first_name'];
    $last_name =$_POST['last_name'];
    $teacher_id =$_POST['teacher_id'];
    $sex =$_POST['sex'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $confirm_password =$_POST['confirm_password'];

    
    if($password !== $confirm_password){
        
        echo '<script>alert("Password and Confirm Password do not match");</script>';
    }else{
        
        $email_check_sql =  "SELECT * FROM teacher WHERE email ='$email'";
        $email_check_result = $conn->query($email_check_sql);
if($email_check_result->num_rows > 0){
            
            echo '<script>alert("Email already exists!");</script>';
            echo '<script>window.location.href = "reg-teach.php";</script>';// redirect to login.php
        }else{
            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO teacher (first_name, last_name, teacher_id, sex, email, password) VALUES
            ('$first_name', '$last_name','$teacher_id', '$sex', '$email', '$hashed_password')";

            
            if($conn->query($sql) === TRUE){
                echo '<script>alert("New record create successfully");</script>';
                echo '<script>window.location.href = "../login.php";</script>';// redirect to login.php
            }else{
                echo '<script>alert("Error: '. $sql . '\n' .$conn->error . '");</script>';
                echo '<script>window.location.href = "../login_connection.php";</script>';// redirect to login.php
            }
        }
    }
}

// to close connection 
$conn->close();
?>