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
    <title>Meghalaya Energy Corportation Limited</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 text-center">
                <h1 class="mb-4">Meghalaya Energy Corportation Limited</h1>
                <hr>
                <p class="mb-4">
                    You will be redirected to payment.<br>
                    <strong>Note:</strong> Please do not refresh or close this page.
                </p>
                <p>Please wait...</p>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery (Optional) - Required for Bootstrap's JavaScript plugins -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Redirect after 10 seconds
        setTimeout(function() {
            window.location.href = "schpayment.php";
        }, 10000); // 10 seconds
    </script>
</body>
</html>
<?php } ?>
