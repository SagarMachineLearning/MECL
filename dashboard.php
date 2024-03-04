<?php
session_start(); // Start the session

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your existing code for handling form submission goes here
}

// Include the header and footer file here
include("includes/header_footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    
   <!-- Include Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  

</head>
<body>
    <!-- Header -->
    <!-- Navigation Menu -->
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
                    <li class="nav-item">
                        <a class="nav-link" href="master/index.php">Pay</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_details.php">Profile</a>
                    </li>
                    <!-- You can add more navigation items here -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Welcome to Your Dashboard</h2>
        <!-- Check if user information is available -->
        <?php if (isset($user)): ?>
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

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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
