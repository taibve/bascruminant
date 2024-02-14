<?php session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Verification</title>
    <link rel="icon" href="bsaura/wimg/CA.png" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: white;
            background-image: url('bsaura/bascimg/login.png');
            color: #ffffff;
            font-family: 'Raleway', sans-serif;
        }

        .navbar {
            background: linear-gradient(to bottom, #7ca875, #0e240c);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 50px;

        }

        .card {
            margin-top: 25%;
            background-color: white;
            color: #ffffff;
        }

        .card-header {
            background-color: #f4f4f4;
            color: #12694f;
            font-weight: bold;
            text-align: center;
        }

        .form-control {
            background-color: white;
            color: #12694f;
        }

        input[type="submit"] {
            background-color: #12694f;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004d40;
        }
        label {
            color: black;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Verification Account</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verification Account</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" placeholder="Enter OPT Code" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Verify" name="verify">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>

<?php 
    include('bsaura/connection.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
            <script>
                alert("Invalid OTP code");
            </script>
            <?php
        } else {
            mysqli_query($connection, "UPDATE user_tbl SET status = 1 WHERE email = '$email'");
            ?>
            <script>
                alert("Verify account done, you may sign in now");
                window.location.replace("index.php");
            </script>
            <?php
        }
    }
?>
