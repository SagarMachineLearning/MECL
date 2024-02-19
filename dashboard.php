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
    $password = "";
    $dbname = "mecl";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

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

    // Check if user exists and password is correct
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc(); // Fetch user data
        if (password_verify($password, $user['password'])) { // Verify password
            // Password is correct, set session variables and redirect to dashboard
            $_SESSION['user_id'] = $user['user_id']; // Store user ID in session
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();}
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles for the dashboard page */
        body {
            background-image: url('assets/bg.jpg'); /* Replace 'background_image.jpg' with your actual background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            padding: 0;
            position: relative;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            color: white;
            padding: 10px 0;
            background-color: #343a40;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Meghalaya Energy Corporation Limited</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Dashboard Content -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Welcome to Your Dashboard</h2>
        <!-- Check if user information is available -->
        <?php if ($user): ?>
            <!-- Display user information -->
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Information</h5>
                            <p class="card-text">Name: <?php echo $user['name']; ?></p>
                            <p class="card-text">Phone Number: <?php echo $user['mobile_number']; ?></p>
                            <!-- Add more user information as needed -->
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Display message if user information is not found -->
            <div class="alert alert-warning" role="alert">
                User information not found. Please edit and upload the form.
            </div>
            <!-- Add form for editing and uploading using JavaScript -->
            <div id="editUploadForm">
                <!-- Form fields for editing and uploading -->
                <!-- You can customize this form according to your requirements -->
            </div>
        <?php endif; ?>
    </div>


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Meghalaya Energy Corporation Limited. All rights reserved.</p>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
