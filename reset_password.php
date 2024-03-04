<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Meghalaya Energy Corporation Limited</a>
        </div>
    </nav>
    <!-- Reset Password Form -->
    <div class="container mt-4">
        <div class="center-container">
            <div class="col-md-6 reset-password-form">
                <h2 class="text-center mb-4">Reset Password</h2>
                <form id="resetPasswordForm" action="reset_password_process.php" method="post">
                    <!-- Reset password form fields -->
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="fixed-bottom">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Meghalaya Energy Corporation Limited. All rights reserved.</p>
        </div>
    </footer>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
