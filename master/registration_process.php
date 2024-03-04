<?php
// register_process.php

// Connect to database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
$consumer_id = $_POST['consumer_id'];
$mobile_number = $_POST['mobile_number'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insert user data into database
$sql = "INSERT INTO users (consumer_id, mobile_number, password) VALUES ('$consumer_id', '$mobile_number', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
