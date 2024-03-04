<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meghalaya Energy Corporation Limited</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .custom-heading {
            font-weight: 700;
            color: #007bff;
        }
        .custom-text {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h1 class="custom-heading">Meghalaya Energy Corporation Limited</h1>
        <hr>
        <?php
        session_start();
        session_destroy();
        setcookie("user", "", time()-3600);
        echo "<p class='custom-text'>You Have Been Logged Out</p>";
        ?>
        <a href="index.php" class="btn btn-primary">Click Here to Exit</a>
    </div>
    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
