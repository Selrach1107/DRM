
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "account_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die ("Connection Error: " .$conn->connect_error);
}
?>