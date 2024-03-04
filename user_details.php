<?php
// Start session
session_start();

// Initialize variables
$errors = array();
$success_message = '';

try {
    // Check if mobile number is set in session
    if (isset($_SESSION['mobile_number'])) {
        // Get mobile number from session
        $mobile_number = $_SESSION['mobile_number'];

        // Connect to the database (replace with your database credentials)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mecl";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to fetch user from database
        $stmt = $conn->prepare("SELECT * FROM users WHERE mobile_number = ?");
        if (!$stmt) {
            throw new Exception("Error in preparing statement: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("s", $mobile_number);

        // Execute the prepared statement
        if (!$stmt->execute()) {
            throw new Exception("Error in executing statement: " . $stmt->error);
        }

        // Get the result
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            // Fetch user details
            $user = $result->fetch_assoc();
        } else {
            throw new Exception("User not found.");
        }

        // Close statement
        $stmt->close();
    } else {
        throw new Exception("Mobile number not set in session.");
    }

} catch (Exception $e) {
    // Handle exceptions
    $errors[] = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/header_footer.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
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
                        <!-- You can add more navigation items here -->
                    </ul>
                </div>
            </div>
        </nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-4">User Details</h2>
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($errors as $error): ?>
                        <?php echo $error; ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th scope="row">Full Name</th>
                            <td><?php echo $user['full_name']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Father's Name</th>
                            <td><?php echo $user['fathers_name']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><?php echo $user['email']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Pin Code</th>
                            <td><?php echo $user['pin_code']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td><?php echo $user['address']; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JavaScript -->
<script src="script.js"></script>
</body>
</html>
