<?php
session_start();
include("connect.php");
if(!(isset($_SESSION['log_user']))) {
    header("location:check.php");
} else {
    $user_name=$_SESSION['log_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Electricity Bill Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center mt-5">
                    <h1 class="mb-4">Meghalaya Electricity Bill Payment</h1>
                    <hr>
                    <p>
                        You have Cancelled your payment<br>
                        Note: Do not refresh or close this page
                    </p>
                    <p>Please wait a moment while your details are being cleared.</p>
                    <p>Loading...</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>
