<?php
// Database configuration
$servername = "localhost"; // Replace 'localhost' with your database hostname
$username = "root"; // Replace 'your_username' with your database username
$password = ""; // Replace 'your_password' with your database password
$dbname = "mecl"; // Replace 'your_database' with your database name

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
