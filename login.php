<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh; /* Adjust height for centering */
        }
        .login-form {
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            transition: box-shadow 0.3s ease;
        }
        .login-form:hover {
            box-shadow: 0px 0px 10px 0px #ccc;
        }
        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        .form-label, .btn {
            font-size: 18px;
            font-weight: bold;
        }
        .form-control {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Meghalaya Energy Corporation Limited</a>
        </div>
    </nav>
  
    <!-- Login Form -->
    <div class="container mt-4">
        <div class="center-container">
            <div class="col-md-6 login-form">
                <h2 class="text-center mb-4">User Login</h2>
                <form id="loginForm" action="login_process.php" method="post">
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Mobile Number:</label>
                        <input type="text" class="form-control" id="mobile_number" name="mobile_number">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <?php
                // Display error message if provided in URL
                if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') {
                    echo '<p class="mt-3 text-center text-danger">Invalid credentials. Please try again.</p>';
                }
                ?>
                <p class="mt-3 text-center">Don't have an account? <a href="register.php">Register here</a>.</p>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Meghalaya Energy Corporation Limited. All rights reserved.</p>
        </div>
    </footer>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
