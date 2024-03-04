<?php
include("includes/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Payment || Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <style>
        /* Custom CSS */
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif; /* Change to desired font */
        }
        .contain {
            margin-top: 50px;
        }
        .loginpad {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            color: #6c757d;
            font-size: 14px; /* Adjust font size */
        }


</head>
<body>
  <?php include("includes/header.php"); ?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="contain">
                    <div class="section">
                        <div class="loginpad">
                            <br>
                            <form action="" method="post">
                                <input type="text" name="c_id" id="txt" class="form-control" placeholder="Enter Your Customer ID" required>
                                <br>
                                <br>
                                <input type="submit" name="btnlogin" id="btn" value="Enter" class="btn btn-primary btn-block">
                            </form>
                            <br>
                            <br>
                            <br>
                            <label>Note: Your Customer Id located with your bill.<br>(Namely: Customer ID)</label><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include("includes/footer.php"); ?>
    <?php
    if(isset($_POST["btnlogin"])) {
        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $c_id = validate_input($_POST["c_id"]);
        if($c_id =="") {
            echo "<script> alert('Please Fill The required Field!');</script>";
            return;
        } else {
            $sql = "SELECT * FROM custumer where cus_id='$c_id'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                session_start();
                $_SESSION['log_user']=$c_id;
                setcookie('user_n',$c_id,time() + 86400*30,'/');
                header("location:home.php");
            } else {
                echo mysqli_error($con);
                return;
            }   
        }
    }
    ?>
</body> 
</html>
