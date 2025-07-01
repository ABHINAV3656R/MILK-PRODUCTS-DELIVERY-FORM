<?php
$servername = "localhost";
$username = "hema";  // Change if needed
$password = "4925@hema";      // Change if needed
$database = "hema";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
