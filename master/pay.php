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
    <title>Meghalaya Electricity Bill Payment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menustyle.css">
</head>
<body>
    <?php include("includes/header.php"); ?>
    <div class="container">
        <?php include("includes/menu.php"); ?>
        <div class="bd">
            <div class="text-center">
                <form action="" method="post">
                    <input type="submit" name="btn_update" value="Pay Now" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['btn_update'])) {
    header("location:process.php");
}
}
?>
