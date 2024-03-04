<?php
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $mobile_number = $_POST["mobile_number"];
    $password = $_POST["password"];

    // Connect to the database (replace with your database credentials)
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

    // Prepare SQL statement to fetch user from database
    $stmt = $conn->prepare("SELECT * FROM users WHERE mobile_number = ?");
    $stmt->bind_param("s", $mobile_number);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc(); // Fetch user data
        if (password_verify($password, $user['password'])) { // Verify password
            // Password is correct, set session variables and redirect to dashboard
            $_SESSION['user_id'] = $user['user_id']; // Store user ID in session
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            // Password is incorrect, redirect back to login with error
            header("Location: login.php?error=invalid_credentials");
            exit();
        }
    } else {
        // User does not exist, redirect back to login with error
        header("Location: login.php?error=invalid_credentials");
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect back to login page
    header("Location: login.php");
    exit();
}
?>
