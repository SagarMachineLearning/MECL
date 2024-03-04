<?php
session_start();
include("connect.php");
if(!(isset($_SESSION['log_user']))) {
    header("location:check.php");
} else {    
    $user_name = $_SESSION['log_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meghalaya Energy Corporation Limited Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center">
                    <h1 class="mt-5">Meghalaya Energy Corporation Limited Electricity Bill Payment</h1>
                    <hr>
                    <p>Your Payment Is Received</p>
                    <a href="home.php" class="btn btn-primary">Click Here</a> To Go Home
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>
