<?php
$servername = "localhost";
$username = "root";
$password = "zebralimon10";
$dbname = "setup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn,"SET CHARACTER SET 'utf8'");
// Check connection
//echo 'Connected!';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 