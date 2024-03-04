<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $mobile_number = $_POST["mobile_number"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate password and confirm password
    if ($password != $confirm_password) {
        // Passwords don't match, redirect back to registration page with error
        header("Location: register.php?error=password_mismatch");
        exit();
    }

    // Passwords match, continue with registration process
    // Connect to database (replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "mecl";

    // Create connection
    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert user into database
    $stmt = $conn->prepare("INSERT INTO users (mobile_number, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $mobile_number, $password_hash);

    // Hash the password for security
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        header("Location: login.php?registration=success");
        exit();
    } else {
        // Error occurred, redirect back to registration page with error
        header("Location: register.php?error=registration_failed");
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect back to registration page
    header("Location: register.php");
    exit();
}
?>
